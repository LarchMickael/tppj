<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_permissions{

    private $bdd;
    protected $per_id;
    protected $per_label;
    protected $per_desc;

    function getPer_id() {
        return $this->per_id;
    }

    function setPer_id($per_id) {
        $this->per_id = $per_id;
    }

    function getPer_label() {
        return $this->per_label;
    }

    function setPer_label($per_label) {
        $this->per_label = $per_label;
    }

    function getPer_desc() {
        return $this->per_desc;
    }

    function setPer_desc($per_desc) {
        $this->per_desc = $per_desc;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "per_id":
                $ret = $this->getPer_id();
            break;
            case "per_label":
                $ret = $this->getPer_label();
            break;
            case "per_desc":
                $ret = $this->getPer_desc();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "per_id":
                $this->setPer_id($value);
            break;
            case "per_label":
                $this->setPer_label($value);
            break;
            case "per_desc":
                $this->setPer_desc($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $per_id id de tpj_permissions
 * @return booléen
 */

    public function get($per_id){
		$ret = false;

		$sql = " SELECT per_id, "
					  ."per_label, "
					  ."per_desc "
		      ." FROM tpj_permissions "
		      ." WHERE per_id = :per_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":per_id", $per_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->per_id = $res["per_id"];
			$this->per_label = $res["per_label"];
			$this->per_desc = $res["per_desc"];

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
        $sql = " SELECT per_id, "
					  ."per_label, "
					  ."per_desc "
              ." FROM tpj_permissions ";
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

        $sql = " INSERT INTO tpj_permissions ( per_label, "
						."per_desc ) "
              ." VALUES ( :per_label, "
						.":per_desc ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":per_label", $this->per_label);
        $req->bindParam(":per_desc", $this->per_desc);

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

        $sql =   " UPDATE tpj_permissions "
				." SET per_label = :per_label, "
					 ."per_desc = :per_desc "
                ." WHERE per_id = :per_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":per_id", $this->per_id);
        $req->bindParam(":per_label", $this->per_label);
        $req->bindParam(":per_desc", $this->per_desc);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->per_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $per_id id visé
 * @return booléen
 */

    public function remove($per_id){

        $ret = false;

        $sql = " DELETE FROM tpj_permissions WHERE per_id = :per_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":per_id", $per_id);

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