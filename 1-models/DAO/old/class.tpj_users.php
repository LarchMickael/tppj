<?php
//include_once('../Services/connexion.php');
include_once('1-models/DAO/connexion.php');

class tpj_users{

    private $bdd;
    protected $use_id;
    protected $use_login;
    protected $use_password;
    protected $use_lastname;
    protected $use_firstname;
    protected $use_mail;

    function getUse_id() {
        return $this->use_id;
    }

    function setUse_id($use_id) {
        $this->use_id = $use_id;
    }

    function getUse_login() {
        return $this->use_login;
    }

    function setUse_login($use_login) {
        $this->use_login = $use_login;
    }

    function getUse_password() {
        return $this->use_password;
    }

    function setUse_password($use_password) {
        $this->use_password = $use_password;
    }

    function getUse_lastname() {
        return $this->use_lastname;
    }

    function setUse_lastname($use_lastname) {
        $this->use_lastname = $use_lastname;
    }

    function getUse_firstname() {
        return $this->use_firstname;
    }

    function setUse_firstname($use_firstname) {
        $this->use_firstname = $use_firstname;
    }

    function getUse_mail() {
        return $this->use_mail;
    }

    function setUse_mail($use_mail) {
        $this->use_mail = $use_mail;
    }

    public function __get($name) {
        $ret=null;
        switch($name){
            case "use_id":
                $ret = $this->getUse_id();
            break;
            case "use_login":
                $ret = $this->getUse_login();
            break;
            case "use_password":
                $ret = $this->getUse_password();
            break;
            case "use_lastname":
                $ret = $this->getUse_lastname();
            break;
            case "use_firstname":
                $ret = $this->getUse_firstname();
            break;
            case "use_mail":
                $ret = $this->getUse_mail();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "use_id":
                $this->setUse_id($value);
            break;
            case "use_login":
                $this->setUse_login($value);
            break;
            case "use_password":
                $this->setUse_password($value);
            break;
            case "use_lastname":
                $this->setUse_lastname($value);
            break;
            case "use_firstname":
                $this->setUse_firstname($value);
            break;
            case "use_mail":
                $this->setUse_mail($value);
            break;
        }
    }

    public function __construct(){

        $this->bdd  = CPDO::get();

    }

/**
 * Récupérer l'objet avec l'id passé en paramêtre
 * @param int $use_id id de tpj_users
 * @return booléen
 */

    public function get($use_id){
		$ret = false;

		$sql = " SELECT use_id, "
					  ."use_login, "
					  ."use_password, "
					  ."use_lastname, "
					  ."use_firstname, "
					  ."use_mail "
		      ." FROM tpj_users "
		      ." WHERE use_id = :use_id ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":use_id", $use_id);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->use_id = $res["use_id"];
			$this->use_login = $res["use_login"];
			$this->use_password = $res["use_password"];
			$this->use_lastname = $res["use_lastname"];
			$this->use_firstname = $res["use_firstname"];
			$this->use_mail = $res["use_mail"];

			$ret = true;
		}

		return $ret;

    }

/**
 * Récupérer toutes les données
 * @param string $filter filtre sql
 * @return array
 */

    public function getAll($filter){
        $ret = false;
        $sql = " SELECT use_id, "
					  ."use_login, "
					  ."use_password, "
					  ."use_lastname, "
					  ."use_firstname, "
					  ."use_mail "
              ." FROM tpj_users ";
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

        $sql = " INSERT INTO tpj_users ( use_login, "
						."use_password, "
						."use_lastname, "
						."use_firstname, "
						."use_mail ) "
              ." VALUES ( :use_login, "
						.":use_password, "
						.":use_lastname, "
						.":use_firstname, "
						.":use_mail ) "

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":use_id", $this->use_id);
        $req->bindParam(":use_login", $this->use_login);
        $req->bindParam(":use_password", $this->use_password);
        $req->bindParam(":use_lastname", $this->use_lastname);
        $req->bindParam(":use_firstname", $this->use_firstname);
        $req->bindParam(":use_mail", $this->use_mail);

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

        $sql =   " UPDATE tpj_users "
				." SET use_id = :use_id, "
					 ."use_login = :use_login, "
					 ."use_password = :use_password, "
					 ."use_lastname = :use_lastname, "
					 ."use_firstname = :use_firstname, "
					 ."use_mail = :use_mail "
                ." WHERE use_id = :use_id ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam("use_id", $this->use_id);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->use_id);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $use_id id visé
 * @return booléen
 */

    public function remove($use_id){

        $ret = false;

        $sql = " DELETE FROM tpj_users WHERE use_id = :use_id ";
        $req = $this->pdo->prepare($sql);
        $req->bindParam("use_id", $use_id);

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