<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_users_recipes{

    private $bdd;
    protected $use_id;
    protected $rec_id;

    function getUse_id() {
        return $this->use_id;
    }

    function setUse_id($use_id) {
        $this->use_id = $use_id;
    }

    function getRec_id() {
        return $this->rec_id;
    }

    function setRec_id($rec_id) {
        $this->rec_id = $rec_id;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "use_id":
                $ret = $this->getUse_id();
            break;
            case "rec_id":
                $ret = $this->getRec_id();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "use_id":
                $this->setUse_id($value);
            break;
            case "rec_id":
                $this->setRec_id($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $use_id id de tpj_users_recipes
 * @return booléen
 */

    public function get($use_id){
		$ret = false;

		$sql = " SELECT use_id, "
					  ." rec_id "
		      ." FROM tpj_users_recipes "
		      ." WHERE use_id = :use_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":use_id", $use_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->use_id = $res["use_id"];
			$this->rec_id = $res["rec_id"];

			$ret = true;
		}

		return $ret;

    }

/**
 * Récupérer toutes les données
 * @param string $filter filtre sql
 * @return array
 */

    public function getAll($filter = null){
        $ret = false;
        $sql = " SELECT use_id, "
					  ." rec_id "
              ." FROM tpj_users_recipes ";
        if(!empty($filter) && isset($filter)){
            $sql .=  " WHERE ". $filter;
        }
        //$sql .=      " ORDER BY  ";

        $req = $this->bdd->prepare($sql);

        try{
            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        $ret = $req->fetchAll(PDO::FETCH_ASSOC);

        return $ret;

    }

/**
 * Récupérer l'objet dans la base de données
 * @param 
 * @return booléen
 */

    public function add(){

	    $ret = false;

        $sql = " INSERT INTO tpj_users_recipes ( rec_id ) "
              ." VALUES ( :rec_id ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $this->rec_id);

        try{
            $req->execute();
            if($this->get($this->bdd->lastInsertId())){
                $ret = true;
            }
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Mettre à jour l'objet dans la base de donnée
 * @param 
 * @return booléen
 */

    public function update(){

        $ret = false;

        $sql =   " UPDATE tpj_users_recipes "
				." SET rec_id = :rec_id "
                ." WHERE use_id = :use_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":use_id", $this->use_id);
        $req->bindParam(":rec_id", $this->rec_id);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->use_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $use_id id visé
 * @return booléen
 */

    public function remove($use_id){

        $ret = false;

        $sql = " DELETE FROM tpj_users_recipes WHERE use_id = :use_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":use_id", $use_id);

        try{
            $req->execute();
            $ret = true;
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }
}
?>