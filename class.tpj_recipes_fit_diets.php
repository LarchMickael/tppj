<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_recipes_fit_diets{

    private $bdd;
    protected $rec_id;
    protected $die_id;

    function getRec_id() {
        return $this->rec_id;
    }

    function setRec_id($rec_id) {
        $this->rec_id = $rec_id;
    }

    function getDie_id() {
        return $this->die_id;
    }

    function setDie_id($die_id) {
        $this->die_id = $die_id;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "rec_id":
                $ret = $this->getRec_id();
            break;
            case "die_id":
                $ret = $this->getDie_id();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "rec_id":
                $this->setRec_id($value);
            break;
            case "die_id":
                $this->setDie_id($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $rec_id id de tpj_recipes_fit_diets
 * @return booléen
 */

    public function get($rec_id){
		$ret = false;

		$sql = " SELECT rec_id, "
					  ." die_id "
		      ." FROM tpj_recipes_fit_diets "
		      ." WHERE rec_id = :rec_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":rec_id", $rec_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->rec_id = $res["rec_id"];
			$this->die_id = $res["die_id"];

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
        $sql = " SELECT rec_id, "
					  ." die_id "
              ." FROM tpj_recipes_fit_diets ";
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

        $sql = " INSERT INTO tpj_recipes_fit_diets ( die_id ) "
              ." VALUES ( :die_id ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":die_id", $this->die_id);

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

        $sql =   " UPDATE tpj_recipes_fit_diets "
				." SET die_id = :die_id "
                ." WHERE rec_id = :rec_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $this->rec_id);
        $req->bindParam(":die_id", $this->die_id);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->rec_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $rec_id id visé
 * @return booléen
 */

    public function remove($rec_id){

        $ret = false;

        $sql = " DELETE FROM tpj_recipes_fit_diets WHERE rec_id = :rec_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $rec_id);

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