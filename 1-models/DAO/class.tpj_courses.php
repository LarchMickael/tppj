<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_courses{

    private $bdd;
    protected $crs_id;
    protected $crs_label;

    function getCrs_id() {
        return $this->crs_id;
    }

    function setCrs_id($crs_id) {
        $this->crs_id = $crs_id;
    }

    function getCrs_label() {
        return $this->crs_label;
    }

    function setCrs_label($crs_label) {
        $this->crs_label = $crs_label;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "crs_id":
                $ret = $this->getCrs_id();
            break;
            case "crs_label":
                $ret = $this->getCrs_label();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "crs_id":
                $this->setCrs_id($value);
            break;
            case "crs_label":
                $this->setCrs_label($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $crs_id id de tpj_courses
 * @return booléen
 */

    public function get($crs_id){
		$ret = false;

		$sql = " SELECT crs_id, "
					  ." crs_label "
		      ." FROM tpj_courses "
		      ." WHERE crs_id = :crs_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":crs_id", $crs_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->crs_id = $res["crs_id"];
			$this->crs_label = $res["crs_label"];

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
        $sql = " SELECT crs_id, "
					  ." crs_label "
              ." FROM tpj_courses ";
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

        $sql = " INSERT INTO tpj_courses ( crs_label ) "
              ." VALUES ( :crs_label ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":crs_label", $this->crs_label);

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

        $sql =   " UPDATE tpj_courses "
				." SET crs_label = :crs_label "
                ." WHERE crs_id = :crs_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":crs_id", $this->crs_id);
        $req->bindParam(":crs_label", $this->crs_label);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->crs_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $crs_id id visé
 * @return booléen
 */

    public function remove($crs_id){

        $ret = false;

        $sql = " DELETE FROM tpj_courses WHERE crs_id = :crs_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":crs_id", $crs_id);

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