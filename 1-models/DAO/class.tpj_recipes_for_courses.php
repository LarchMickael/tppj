<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_recipes_for_courses{

    private $bdd;
    protected $crs_id;
    protected $rec_id;

    function getCrs_id() {
        return $this->crs_id;
    }

    function setCrs_id($crs_id) {
        $this->crs_id = $crs_id;
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
            case "crs_id":
                $ret = $this->getCrs_id();
            break;
            case "rec_id":
                $ret = $this->getRec_id();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "crs_id":
                $this->setCrs_id($value);
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
 * @param int $crs_id id de tpj_recipes_for_courses
 * @return booléen
 */

    public function get($crs_id){
		$ret = false;

		$sql = " SELECT crs_id, "
					  ." rec_id "
		      ." FROM tpj_recipes_for_courses "
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
        $sql = " SELECT crs_id, "
					  ." rec_id "
              ." FROM tpj_recipes_for_courses ";
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
 * Récupérer toutes les types de plats associés à une recette
 * @param int $rec_id id recherché
 * @return array de int
 */

    public function getAllCourses($rec_id){
        $ret = false;
        $sql = " SELECT crs_id "
              ." FROM tpj_recipes_for_courses "
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
            $val = $val['crs_id'];
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

        $sql = " INSERT INTO tpj_recipes_for_courses ( rec_id, crs_id ) "
              ." VALUES ( :rec_id, :crs_id ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $this->rec_id);
        $req->bindParam(":crs_id", $this->crs_id);

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

        $sql =   " UPDATE tpj_recipes_for_courses "
				." SET rec_id = :rec_id "
                ." WHERE crs_id = :crs_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":crs_id", $this->crs_id);
        $req->bindParam(":rec_id", $this->rec_id);

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

    public function remove($rec_id){

        $ret = false;

        $sql = " DELETE FROM tpj_recipes_for_courses WHERE rec_id = :rec_id ";

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