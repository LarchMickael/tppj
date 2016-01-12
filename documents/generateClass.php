<?php

include_once('1-models/DAO/class.CPDO.php');
$bdd = CPDO::get();
echo 'generating class...<br /><br />';

$tables = array();

$sql =  "SHOW TABLES";

foreach  ($bdd->query($sql) as $row) {
    $tables[$row[0]] = array();
    $sqlcol =  "SHOW COLUMNS FROM ".$row[0];
    foreach  ($bdd->query($sqlcol) as $col) {
        $tables[$row[0]][] = $col['Field'] ;
    }
}

createFiles($tables);

function createFiles($datas){
	foreach($datas as $table => $champs){
        echo 'class.'.$table.'.php<br/>';
		file_put_contents('class.'.$table.'.php',createFile($table, $champs));
	}
}

function createFile($table, $champs){

	$champsImplode = implode(', "'."\n".'					  ." ', $champs);

	$file ='<?php'.PHP_EOL;
	$file.='include_once(\'1-models/DAO/class.CPDO.php\');'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='class '.$table.'{'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='    private $bdd;'.PHP_EOL;

	foreach($champs as $champ){
            $file.='    protected $'.$champ.';'.PHP_EOL;
	}

    foreach($champs as $champ){
        $firstLetter = ucfirst(strtolower($champ));
        $file.=''.PHP_EOL;
        $file.='    function get'.$firstLetter.'() {'.PHP_EOL;
        $file.='        return $this->'.$champ.';'.PHP_EOL;
        $file.='    }'.PHP_EOL;
        $file.=''.PHP_EOL;
        $file.='    function set'.$firstLetter.'($'.$champ.') {'.PHP_EOL;
        $file.='        $this->'.$champ.' = $'.$champ.';'.PHP_EOL;
        $file.='    }'.PHP_EOL;
	}
        
	$file.=''.PHP_EOL;
    $file.='    public function __get($name) {'.PHP_EOL;
    $file.='        $ret=null;'.PHP_EOL;
    $file.='        switch($name){'.PHP_EOL;

    foreach($champs as $champ){
        $firstLetter = ucfirst(strtolower($champ));
        $file.='            case "'.$champ.'":'.PHP_EOL;
        $file.='                $ret = $this->get'.$firstLetter.'();'.PHP_EOL;
        $file.='            break;'.PHP_EOL;
    }
    $file.='        }'.PHP_EOL;
    $file.='        return $ret;'.PHP_EOL;
    $file.='    }'.PHP_EOL;
        
	$file.=''.PHP_EOL;

    $file.='    public function __set($name, $value) {'.PHP_EOL;
    $file.='        switch($name){'.PHP_EOL;

    foreach($champs as $champ){
        $firstLetter = ucfirst(strtolower($champ));
        $file.='            case "'.$champ.'":'.PHP_EOL;
        $file.='                $this->set'.$firstLetter.'($value);'.PHP_EOL;
        $file.='            break;'.PHP_EOL;
    }
    $file.='        }'.PHP_EOL;
    $file.='    }'.PHP_EOL;
    
    $file.=''.PHP_EOL;

	$file.='    public function __construct(){'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $this->bdd  = CPDO::get();'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='    }'.PHP_EOL;

	$file.=''.PHP_EOL;
	
	$file.='/**'.PHP_EOL;
    $file.=' * Récupérer l\'objet avec l\'id passé en paramêtre'.PHP_EOL;
    $file.=' * @param int $'.$champs[0].' id de '.$table.''.PHP_EOL;
    $file.=' * @return booléen'.PHP_EOL;
    $file.=' */'.PHP_EOL;

	$file.=''.PHP_EOL;

	$file.='    public function get($'.$champs[0].'){'.PHP_EOL;
	$file.='		$ret = false;'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='		$sql = " SELECT '.$champsImplode.' "'.PHP_EOL;
	$file.='		      ." FROM '.$table.' "'.PHP_EOL;
	$file.='		      ." WHERE '.$champs[0].' = :'.$champs[0].' ";'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='		$req = $this->bdd->prepare($sql);'.PHP_EOL;
	$file.='		$req->bindParam(":'.$champs[0].'", $'.$champs[0].');'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='		try{'.PHP_EOL;
	$file.='			$req->execute();'.PHP_EOL;
	$file.='		} catch (PDOException $ex) {'.PHP_EOL;
	$file.='			die("Erreur PDO : ".$ex);'.PHP_EOL;
	$file.='		}'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='		if($req->rowCount() > 0){'.PHP_EOL;
	$file.='			$res = $req->fetch(PDO::FETCH_ASSOC);'.PHP_EOL;
					foreach ($champs as $champ) {
	$file.='			$this->'.$champ.' = $res["'.$champ.'"];'.PHP_EOL;
					}
	$file.=''.PHP_EOL;
	$file.='			$ret = true;'.PHP_EOL;
	$file.='		}'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='		return $ret;'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='    }'.PHP_EOL;

	$file.=''.PHP_EOL;
	
    $file.='/**'.PHP_EOL;
    $file.=' * Récupérer toutes les données'.PHP_EOL;
    $file.=' * @param string $filter filtre sql'.PHP_EOL;
    $file.=' * @return array'.PHP_EOL;
    $file.=' */'.PHP_EOL;

	$file.=''.PHP_EOL;

	$file.='    public function getAll($filter = null){'.PHP_EOL;
	
	$file.='        $ret = false;'.PHP_EOL;
	$file.='        $sql = " SELECT '.$champsImplode.' "'.PHP_EOL;
	$file.='              ." FROM '.$table.' ";'.PHP_EOL;
	$file.='        if(!empty($filter) && isset($filter)){'.PHP_EOL;
	$file.='            $sql .=  " WHERE ". $filter;'.PHP_EOL;
	$file.='        }'.PHP_EOL;
	$file.='        //$sql .=      " ORDER BY  ";'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $req = $this->bdd->prepare($sql);'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        try{'.PHP_EOL;
	$file.='            $req->execute();'.PHP_EOL;
	$file.='        } catch (PDOException $ex) {'.PHP_EOL;
	$file.='            die("Erreur PDO : ".$ex);'.PHP_EOL;
	$file.='        }'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $ret = $req->fetchAll(PDO::FETCH_ASSOC);'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        return $ret;'.PHP_EOL;	

	$file.=''.PHP_EOL;
	$file.='    }'.PHP_EOL;

	$file.=''.PHP_EOL;
	
	$file.='/**'.PHP_EOL;
    $file.=' * Récupérer l\'objet dans la base de données'.PHP_EOL;
    $file.=' * @param '.PHP_EOL;
    $file.=' * @return booléen'.PHP_EOL;
    $file.=' */'.PHP_EOL;

	$file.=''.PHP_EOL;

	$addArray = $champs;
	array_shift($addArray);
	$insertFields = implode(', "'."\n".'						." ', $addArray);
	$valuesFields = implode(', "'."\n".'						." :', $addArray);

	$file.='    public function add(){'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='	    $ret = false;'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $sql = " INSERT INTO '.$table.' ( '.$insertFields.' ) "'.PHP_EOL;
	$file.='              ." VALUES ( :'.$valuesFields.' ) ";'.PHP_EOL;
	$file.=''.PHP_EOL;	
	$file.='        $req = $this->bdd->prepare($sql);'.PHP_EOL;
					foreach ($addArray as $champ) {
	$file.='        $req->bindParam(":'.$champ.'", $this->'.$champ.');'.PHP_EOL;
					}
	$file.=''.PHP_EOL;
	$file.='        try{'.PHP_EOL;
	$file.='            $req->execute();'.PHP_EOL;
	$file.='            if($this->get($this->bdd->lastInsertId())){'.PHP_EOL;
	$file.='                $ret = true;'.PHP_EOL;
	$file.='            }'.PHP_EOL;
	$file.='        } catch (PDOException $ex) {'.PHP_EOL;
	$file.='            die("Erreur PDO : ".$ex);'.PHP_EOL;
	$file.='        }'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        return $ret;'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='    }'.PHP_EOL;

	$file.=''.PHP_EOL;


	$updateArray = $champs;
	array_shift($updateArray);
	$updateFields = array();
	foreach ($updateArray as $field) {
		$var = $field.' = :'.$field;
		array_push($updateFields, $var);
	}
	$implodeUpdateFields = implode(', "'."\n".'					 ." ', $updateFields);


	$file.='/**'.PHP_EOL;
    $file.=' * Mettre à jour l\'objet dans la base de donnée'.PHP_EOL;
    $file.=' * @param '.PHP_EOL;
    $file.=' * @return booléen'.PHP_EOL;
    $file.=' */'.PHP_EOL;
    
	$file.=''.PHP_EOL;

	$file.='    public function update(){'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $ret = false;'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $sql =   " UPDATE '.$table.' "'.PHP_EOL;
	$file.='				." SET '.$implodeUpdateFields.' "'.PHP_EOL;
	$file.='                ." WHERE '.$champs[0].' = :'.$champs[0].' ";'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $req = $this->bdd->prepare($sql);'.PHP_EOL;
					foreach ($champs as $champ) {
	$file.='        $req->bindParam(":'.$champ.'", $this->'.$champ.');'.PHP_EOL;
					}	$file.=''.PHP_EOL;
	$file.='        try{'.PHP_EOL;
	$file.='            $req->execute();'.PHP_EOL;
	$file.='            $ret = true;'.PHP_EOL;
	$file.='            $this->get($this->'.$champs[0].');'.PHP_EOL;
	$file.='        } catch (PDOException $ex) {'.PHP_EOL;
	$file.='            die("Erreur PDO : ".$ex);'.PHP_EOL;
	$file.='        }'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        return $ret;'.PHP_EOL;	
	$file.=''.PHP_EOL;
	$file.='    }'.PHP_EOL;

	$file.=''.PHP_EOL;

	$file.='/**'.PHP_EOL;
    $file.=' * Supprime l\'objet correspondant à l\'id passé en paramêtre dans la base de donnée'.PHP_EOL;
    $file.=' * @param int $'.$champs[0].' id visé'.PHP_EOL;
    $file.=' * @return booléen'.PHP_EOL;
    $file.=' */'.PHP_EOL;
    
	$file.=''.PHP_EOL;

	$file.='    public function remove($'.$champs[0].'){'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $ret = false;'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        $sql = " DELETE FROM '.$table.' WHERE '.$champs[0].' = :'.$champs[0].' ";'.PHP_EOL;
	$file.=''.PHP_EOL;        
	$file.='        $req = $this->bdd->prepare($sql);'.PHP_EOL;
	$file.='        $req->bindParam(":'.$champs[0].'", $'.$champs[0].');'.PHP_EOL;
	$file.=''.PHP_EOL;        
	$file.='        try{'.PHP_EOL;
	$file.='            $req->execute();'.PHP_EOL;
	$file.='            $ret = true;'.PHP_EOL;
	$file.='        } catch (PDOException $ex) {'.PHP_EOL;
	$file.='            die("Erreur PDO : ".$ex);'.PHP_EOL;
	$file.='        }'.PHP_EOL;
	$file.=''.PHP_EOL;
	$file.='        return $ret;'.PHP_EOL;

	$file.=''.PHP_EOL;
	$file.='    }'.PHP_EOL;
	$file.='}'.PHP_EOL;

	$file.='?>';
	return $file;
}


?>