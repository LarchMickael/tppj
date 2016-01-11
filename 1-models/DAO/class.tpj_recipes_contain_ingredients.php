<?php
include_once('1-models/DAO/class.CPDO.php');

class tpj_recipes_contain_ingredients{

    private $bdd;
    protected $quantity;
    protected $ing_id;
    protected $rec_id;

    function getQuantity() {
        return $this->quantity;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function getIng_id() {
        return $this->ing_id;
    }

    function setIng_id($ing_id) {
        $this->ing_id = $ing_id;
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
            case "quantity":
                $ret = $this->getQuantity();
            break;
            case "ing_id":
                $ret = $this->getIng_id();
            break;
            case "rec_id":
                $ret = $this->getRec_id();
            break;
        }
        return $ret;
    }

    public function __set($name, $value) {
        switch($name){
            case "quantity":
                $this->setQuantity($value);
            break;
            case "ing_id":
                $this->setIng_id($value);
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
 * @param int $quantity id de tpj_recipes_contain_ingredients
 * @return booléen
 */

    public function get($quantity){
		$ret = false;

		$sql = " SELECT quantity, "
					  ."ing_id, "
					  ."rec_id "
		      ." FROM tpj_recipes_contain_ingredients "
		      ." WHERE quantity = :quantity ";

		$req = $this->bdd->prepare($sql);
		$req->bindParam(":quantity", $quantity);

		try{
			$req->execute();
		} catch (PDOException $ex) {
			die("Erreur PDO : ".$ex);
		}

		if($req->rowCount() > 0){
			$res = $req->fetch(PDO::FETCH_ASSOC);
			$this->quantity = $res["quantity"];
			$this->ing_id = $res["ing_id"];
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
        $sql = " SELECT quantity, "
					  ."ing_id, "
					  ."rec_id "
              ." FROM tpj_recipes_contain_ingredients ";
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

        $sql = " INSERT INTO tpj_recipes_contain_ingredients ( ing_id, "
						."rec_id ) "
              ." VALUES ( :ing_id, "
						.":rec_id ) ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":ing_id", $this->ing_id);
        $req->bindParam(":rec_id", $this->rec_id);

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

        $sql =   " UPDATE tpj_recipes_contain_ingredients "
				." SET ing_id = :ing_id, "
					 ."rec_id = :rec_id "
                ." WHERE quantity = :quantity ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":quantity", $this->quantity);
        $req->bindParam(":ing_id", $this->ing_id);
        $req->bindParam(":rec_id", $this->rec_id);

        try{
            $req->execute();
            $ret = true;
            $this->get($this->quantity);
        } catch (PDOException $ex) {
            die("Erreur PDO : ".$ex);
        }

        return $ret;

    }

/**
 * Supprime l'objet correspondant à l'id passé en paramêtre dans la base de donnée
 * @param int $quantity id visé
 * @return booléen
 */

    public function remove($quantity){

        $ret = false;

        $sql = " DELETE FROM tpj_recipes_contain_ingredients WHERE quantity = :quantity ";

        $req = $this->bdd->prepare($sql);
        $req->bindParam(":quantity", $quantity);

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