<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_units{

    private $bdd;
    protected $unt_id;
    protected $unt_label;
    protected $unt_desc;

    function getUnt_id() {
        return $this->unt_id;
    }

    function setUnt_id($unt_id) {
        $this->unt_id = $unt_id;
    }

    function getUnt_label() {
        return $this->unt_label;
    }

    function setUnt_label($unt_label) {
        $this->unt_label = $unt_label;
    }

    function getUnt_desc() {
        return $this->unt_desc;
    }

    function setUnt_desc($unt_desc) {
        $this->unt_desc = $unt_desc;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "unt_id":
                $ret = $this->getUnt_id();
            break;
            case "unt_label":
                $ret = $this->getUnt_label();
            break;
            case "unt_desc":
                $ret = $this->getUnt_desc();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "unt_id":
                $this->setUnt_id($value);
            break;
            case "unt_label":
                $this->setUnt_label($value);
            break;
            case "unt_desc":
                $this->setUnt_desc($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $unt_id id de tpj_units
 * @return booléen
 */

    public function get($unt_id){
		$ret = false;

		$sql = " SELECT unt_id, "
					  ." unt_label, "
					  ." unt_desc "
		      ." FROM tpj_units "
		      ." WHERE unt_id = :unt_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":unt_id", $unt_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->unt_id = $res["unt_id"];
			$this->unt_label = $res["unt_label"];
			$this->unt_desc = $res["unt_desc"];

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
        $sql = " SELECT unt_id, "
					  ." unt_label, "
					  ." unt_desc "
              ." FROM tpj_units ";
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

        $sql = " INSERT INTO tpj_units ( unt_label, "
						." unt_desc ) "
              ." VALUES ( :unt_label, "
						." :unt_desc ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":unt_label", $this->unt_label);
        $req->bindParam(":unt_desc", $this->unt_desc);

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

        $sql =   " UPDATE tpj_units "
				." SET unt_label = :unt_label, "
					 ." unt_desc = :unt_desc "
                ." WHERE unt_id = :unt_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":unt_id", $this->unt_id);
        $req->bindParam(":unt_label", $this->unt_label);
        $req->bindParam(":unt_desc", $this->unt_desc);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->unt_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $unt_id id visé
 * @return booléen
 */

    public function remove($unt_id){

        $ret = false;

        $sql = " DELETE FROM tpj_units WHERE unt_id = :unt_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":unt_id", $unt_id);

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