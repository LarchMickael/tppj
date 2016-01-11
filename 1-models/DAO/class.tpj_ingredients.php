<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_ingredients{

    private $bdd;
    protected $ing_id;
    protected $ing_label;
    protected $unt_id;

    function getIng_id() {
        return $this->ing_id;
    }

    function setIng_id($ing_id) {
        $this->ing_id = $ing_id;
    }

    function getIng_label() {
        return $this->ing_label;
    }

    function setIng_label($ing_label) {
        $this->ing_label = $ing_label;
    }

    function getUnt_id() {
        return $this->unt_id;
    }

    function setUnt_id($unt_id) {
        $this->unt_id = $unt_id;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "ing_id":
                $ret = $this->getIng_id();
            break;
            case "ing_label":
                $ret = $this->getIng_label();
            break;
            case "unt_id":
                $ret = $this->getUnt_id();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "ing_id":
                $this->setIng_id($value);
            break;
            case "ing_label":
                $this->setIng_label($value);
            break;
            case "unt_id":
                $this->setUnt_id($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $ing_id id de tpj_ingredients
 * @return booléen
 */

    public function get($ing_id){
		$ret = false;

		$sql = " SELECT ing_id, "
					  ."ing_label, "
					  ."unt_id "
		      ." FROM tpj_ingredients "
		      ." WHERE ing_id = :ing_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":ing_id", $ing_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->ing_id = $res["ing_id"];
			$this->ing_label = $res["ing_label"];
			$this->unt_id = $res["unt_id"];

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
        $sql = " SELECT ing_id, "
					  ."ing_label, "
					  ."unt_id "
              ." FROM tpj_ingredients ";
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

        $sql = " INSERT INTO tpj_ingredients ( ing_label, "
						."unt_id ) "
              ." VALUES ( :ing_label, "
						.":unt_id ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":ing_label", $this->ing_label);
        $req->bindParam(":unt_id", $this->unt_id);

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

        $sql =   " UPDATE tpj_ingredients "
				." SET ing_label = :ing_label, "
					 ."unt_id = :unt_id "
                ." WHERE ing_id = :ing_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":ing_id", $this->ing_id);
        $req->bindParam(":ing_label", $this->ing_label);
        $req->bindParam(":unt_id", $this->unt_id);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->ing_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $ing_id id visé
 * @return booléen
 */

    public function remove($ing_id){

        $ret = false;

        $sql = " DELETE FROM tpj_ingredients WHERE ing_id = :ing_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":ing_id", $ing_id);

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