<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_roles{

    private $bdd;
    protected $rol_id;
    protected $rol_label;

    function getRol_id() {
        return $this->rol_id;
    }

    function setRol_id($rol_id) {
        $this->rol_id = $rol_id;
    }

    function getRol_label() {
        return $this->rol_label;
    }

    function setRol_label($rol_label) {
        $this->rol_label = $rol_label;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "rol_id":
                $ret = $this->getRol_id();
            break;
            case "rol_label":
                $ret = $this->getRol_label();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "rol_id":
                $this->setRol_id($value);
            break;
            case "rol_label":
                $this->setRol_label($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $rol_id id de tpj_roles
 * @return booléen
 */

    public function get($rol_id){
		$ret = false;

		$sql = " SELECT rol_id, "
					  ." rol_label "
		      ." FROM tpj_roles "
		      ." WHERE rol_id = :rol_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":rol_id", $rol_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->rol_id = $res["rol_id"];
			$this->rol_label = $res["rol_label"];

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
        $sql = " SELECT rol_id, "
					  ." rol_label "
              ." FROM tpj_roles ";
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

        $sql = " INSERT INTO tpj_roles ( rol_label ) "
              ." VALUES ( :rol_label ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rol_label", $this->rol_label);

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

        $sql =   " UPDATE tpj_roles "
				." SET rol_label = :rol_label "
                ." WHERE rol_id = :rol_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rol_id", $this->rol_id);
        $req->bindParam(":rol_label", $this->rol_label);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->rol_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $rol_id id visé
 * @return booléen
 */

    public function remove($rol_id){

        $ret = false;

        $sql = " DELETE FROM tpj_roles WHERE rol_id = :rol_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":rol_id", $rol_id);

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