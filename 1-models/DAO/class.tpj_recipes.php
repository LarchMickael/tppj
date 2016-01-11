<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_recipes{

    private $bdd;
    protected $rec_id;
    protected $rec_title;
    protected $rec_link;
    protected $rec_tppj;
    protected $mea_id;
    protected $die_id;
    protected $cou_code;

    function getRec_id() {
        return $this->rec_id;
    }

    function setRec_id($rec_id) {
        $this->rec_id = $rec_id;
    }

    function getRec_title() {
        return $this->rec_title;
    }

    function setRec_title($rec_title) {
        $this->rec_title = $rec_title;
    }

    function getRec_link() {
        return $this->rec_link;
    }

    function setRec_link($rec_link) {
        $this->rec_link = $rec_link;
    }

    function getRec_tppj() {
        return $this->rec_tppj;
    }

    function setRec_tppj($rec_tppj) {
        $this->rec_tppj = $rec_tppj;
    }

    function getMea_id() {
        return $this->mea_id;
    }

    function setMea_id($mea_id) {
        $this->mea_id = $mea_id;
    }

    function getDie_id() {
        return $this->die_id;
    }

    function setDie_id($die_id) {
        $this->die_id = $die_id;
    }

    function getCou_code() {
        return $this->cou_code;
    }

    function setCou_code($cou_code) {
        $this->cou_code = $cou_code;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "rec_id":
                $ret = $this->getRec_id();
            break;
            case "rec_title":
                $ret = $this->getRec_title();
            break;
            case "rec_link":
                $ret = $this->getRec_link();
            break;
            case "rec_tppj":
                $ret = $this->getRec_tppj();
            break;
            case "mea_id":
                $ret = $this->getMea_id();
            break;
            case "die_id":
                $ret = $this->getDie_id();
            break;
            case "cou_code":
                $ret = $this->getCou_code();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "rec_id":
                $this->setRec_id($value);
            break;
            case "rec_title":
                $this->setRec_title($value);
            break;
            case "rec_link":
                $this->setRec_link($value);
            break;
            case "rec_tppj":
                $this->setRec_tppj($value);
            break;
            case "mea_id":
                $this->setMea_id($value);
            break;
            case "die_id":
                $this->setDie_id($value);
            break;
            case "cou_code":
                $this->setCou_code($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $rec_id id de tpj_recipes
 * @return booléen
 */

    public function get($rec_id){
		$ret = false;

		$sql = " SELECT rec_id, "
					  ."rec_title, "
					  ."rec_link, "
					  ."rec_tppj, "
					  ."mea_id, "
					  ."die_id, "
					  ."cou_code "
		      ." FROM tpj_recipes "
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
			$this->rec_title = $res["rec_title"];
			$this->rec_link = $res["rec_link"];
			$this->rec_tppj = $res["rec_tppj"];
			$this->mea_id = $res["mea_id"];
			$this->die_id = $res["die_id"];
			$this->cou_code = $res["cou_code"];

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
					  ."rec_title, "
					  ."rec_link, "
					  ."rec_tppj, "
					  ."mea_id, "
					  ."die_id, "
					  ."cou_code "
              ." FROM tpj_recipes ";
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
     * Vérifie la présence dans la base tpj_recipes de l'id passé en paramêtre
     * @param String $rec_if id recherché
     * @return booléen : true si existe
     */    

    public function isRecipeExist($rec_id){

        $ret = false;

        $sql = " SELECT rec_title "
              ." FROM tpj_recipes "
              ." WHERE rec_id = :rec_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $rec_id);

        try {
            $req->execute();
            if ($req->rowCount() > 0) {
                $ret = true;
            }
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
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

        $sql = " INSERT INTO tpj_recipes ( rec_title, "
						."rec_link, "
						."rec_tppj, "
						."mea_id, "
						."die_id, "
						."cou_code ) "
              ." VALUES ( :rec_title, "
						.":rec_link, "
						.":rec_tppj, "
						.":mea_id, "
						.":die_id, "
						.":cou_code ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_title", $this->rec_title);
        $req->bindParam(":rec_link", $this->rec_link);
        $req->bindParam(":rec_tppj", $this->rec_tppj);
        $req->bindParam(":mea_id", $this->mea_id);
        $req->bindParam(":die_id", $this->die_id);
        $req->bindParam(":cou_code", $this->cou_code);

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

        $sql =   " UPDATE tpj_recipes "
				." SET rec_title = :rec_title, "
					 ." rec_link = :rec_link, "
					 ." rec_tppj = :rec_tppj, "
					 ." mea_id = :mea_id, "
					 ." die_id = :die_id, "
					 ." cou_code = :cou_code "
                ." WHERE rec_id = :rec_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rec_id", $this->rec_id);
        $req->bindParam(":rec_title", $this->rec_title);
        $req->bindParam(":rec_link", $this->rec_link);
        $req->bindParam(":rec_tppj", $this->rec_tppj);
        $req->bindParam(":mea_id", $this->mea_id);
        $req->bindParam(":die_id", $this->die_id);
        $req->bindParam(":cou_code", $this->cou_code);

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

        $sql = " DELETE FROM tpj_recipes WHERE rec_id = :rec_id ";

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