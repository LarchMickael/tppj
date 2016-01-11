<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_diets{

    private $bdd;
    protected $die_id;
    protected $die_label;

    function getDie_id() {
        return $this->die_id;
    }

    function setDie_id($die_id) {
        $this->die_id = $die_id;
    }

    function getDie_label() {
        return $this->die_label;
    }

    function setDie_label($die_label) {
        $this->die_label = $die_label;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "die_id":
                $ret = $this->getDie_id();
            break;
            case "die_label":
                $ret = $this->getDie_label();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "die_id":
                $this->setDie_id($value);
            break;
            case "die_label":
                $this->setDie_label($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $die_id id de tpj_diets
 * @return booléen
 */

    public function get($die_id){
		$ret = false;

		$sql = " SELECT die_id, "
					  ."die_label "
		      ." FROM tpj_diets "
		      ." WHERE die_id = :die_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":die_id", $die_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->die_id = $res["die_id"];
			$this->die_label = $res["die_label"];

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
        $sql = " SELECT die_id, "
					  ."die_label "
              ." FROM tpj_diets ";
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

        $sql = " INSERT INTO tpj_diets ( die_label ) "
              ." VALUES ( :die_label ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":die_label", $this->die_label);

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

        $sql =   " UPDATE tpj_diets "
				." SET die_label = :die_label "
                ." WHERE die_id = :die_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":die_id", $this->die_id);
        $req->bindParam(":die_label", $this->die_label);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->die_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $die_id id visé
 * @return booléen
 */

    public function remove($die_id){

        $ret = false;

        $sql = " DELETE FROM tpj_diets WHERE die_id = :die_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":die_id", $die_id);

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