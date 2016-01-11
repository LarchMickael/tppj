<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_countries{

    private $bdd;
    protected $cou_code;
    protected $cou_name;

    function getCou_code() {
        return $this->cou_code;
    }

    function setCou_code($cou_code) {
        $this->cou_code = $cou_code;
    }

    function getCou_name() {
        return $this->cou_name;
    }

    function setCou_name($cou_name) {
        $this->cou_name = $cou_name;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "cou_code":
                $ret = $this->getCou_code();
            break;
            case "cou_name":
                $ret = $this->getCou_name();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "cou_code":
                $this->setCou_code($value);
            break;
            case "cou_name":
                $this->setCou_name($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $cou_code id de tpj_countries
 * @return booléen
 */

    public function get($cou_code){
		$ret = false;

		$sql = " SELECT cou_code, "
					  ."cou_name "
		      ." FROM tpj_countries "
		      ." WHERE cou_code = :cou_code ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":cou_code", $cou_code);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->cou_code = $res["cou_code"];
			$this->cou_name = $res["cou_name"];

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
        $sql = " SELECT cou_code, "
					  ."cou_name "
              ." FROM tpj_countries ";
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

        $sql = " INSERT INTO tpj_countries ( cou_name ) "
              ." VALUES ( :cou_name ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":cou_name", $this->cou_name);

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

        $sql =   " UPDATE tpj_countries "
				." SET cou_name = :cou_name "
                ." WHERE cou_code = :cou_code ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":cou_code", $this->cou_code);
        $req->bindParam(":cou_name", $this->cou_name);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->cou_code);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $cou_code id visé
 * @return booléen
 */

    public function remove($cou_code){

        $ret = false;

        $sql = " DELETE FROM tpj_countries WHERE cou_code = :cou_code ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":cou_code", $cou_code);

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