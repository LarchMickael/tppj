<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_meals{

    private $bdd;
    protected $mea_id;
    protected $mea_label;

    function getMea_id() {
        return $this->mea_id;
    }

    function setMea_id($mea_id) {
        $this->mea_id = $mea_id;
    }

    function getMea_label() {
        return $this->mea_label;
    }

    function setMea_label($mea_label) {
        $this->mea_label = $mea_label;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "mea_id":
                $ret = $this->getMea_id();
            break;
            case "mea_label":
                $ret = $this->getMea_label();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "mea_id":
                $this->setMea_id($value);
            break;
            case "mea_label":
                $this->setMea_label($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $mea_id id de tpj_meals
 * @return booléen
 */

    public function get($mea_id){
		$ret = false;

		$sql = " SELECT mea_id, "
					  ."mea_label "
		      ." FROM tpj_meals "
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
			$this->mea_label = $res["mea_label"];

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
					  ."mea_label "
              ." FROM tpj_meals ";
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

        $sql = " INSERT INTO tpj_meals ( mea_label ) "
              ." VALUES ( :mea_label ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":mea_label", $this->mea_label);

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

        $sql =   " UPDATE tpj_meals "
				." SET mea_label = :mea_label "
                ." WHERE mea_id = :mea_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":mea_id", $this->mea_id);
        $req->bindParam(":mea_label", $this->mea_label);

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

    public function remove($mea_id){

        $ret = false;

        $sql = " DELETE FROM tpj_meals WHERE mea_id = :mea_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":mea_id", $mea_id);

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