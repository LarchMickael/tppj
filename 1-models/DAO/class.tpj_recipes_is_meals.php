<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_recipes_is_meals{

    private $bdd;
    protected $mea_id;
    protected $rec_id;

    function getMea_id() {
        return $this->mea_id;
    }

    function setMea_id($mea_id) {
        $this->mea_id = $mea_id;
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
            case "mea_id":
                $ret = $this->getMea_id();
            break;
            case "rec_id":
                $ret = $this->getRec_id();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "mea_id":
                $this->setMea_id($value);
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
 * @param int $mea_id id de tpj_recipes_is_meals
 * @return booléen
 */

    public function get($mea_id){
		$ret = false;

		$sql = " SELECT mea_id, "
					  ." rec_id "
		      ." FROM tpj_recipes_is_meals "
		      ." WHERE mea_id = :mea_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":mea_id", $mea_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->mea_id = $res["mea_id"];
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
        $sql = " SELECT mea_id, "
					  ." rec_id "
              ." FROM tpj_recipes_is_meals ";
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
 * Récupérer toutes les types de repas associés à une recette
 * @param int $rec_id id recherché
 * @return array de int
 */

    public function getAllMeals($rec_id){
        $ret = false;
        $sql = " SELECT mea_id "
              ." FROM tpj_recipes_is_meals "
              ." WHERE rec_id = :rec_id ";
        
        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $rec_id);

        try{
            $req->execute();
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        $ret = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach($ret as &$val){
            $val = $val['mea_id'];
        }

        return $ret;

    }    

/**
 * Récupérer l'objet dans la base de données
 * @param 
 * @return booléen
 */

    public function add(){

	    $ret = false;

        $sql = " INSERT INTO tpj_recipes_is_meals ( rec_id, mea_id ) "
              ." VALUES ( :rec_id, :mea_id ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $this->rec_id);
        $req->bindParam(":mea_id", $this->mea_id);

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

        $sql =   " UPDATE tpj_recipes_is_meals "
				." SET rec_id = :rec_id "
                ." WHERE mea_id = :mea_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":mea_id", $this->mea_id);
        $req->bindParam(":rec_id", $this->rec_id);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->mea_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $mea_id id visé
 * @return booléen
 */

    public function remove($rec_id){

        $ret = false;

        $sql = " DELETE FROM tpj_recipes_is_meals WHERE rec_id = :rec_id ";

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