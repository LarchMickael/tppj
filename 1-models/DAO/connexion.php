<?php

// Init vars
$dsn_bdd = 'mysql:host=localhost;dbname=tppjdb'; //Data Source Name
$user_bdd = 'root';
$pass_bdd = 'le_titi_mysql@76000';
// options de connection
$options = array(
    // Exectue une requête à chaque connexion
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //équivalent de mysql_set_charset('utf8')
    // rapport d'erreur
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // émet une exception
);


// on essai de se connecter à la base de données
try {
    $bdd = new PDO($dsn_bdd, $user_bdd, $pass_bdd, $options);
} catch (Exception $e) {
	echo "<!-- La Connection à la base de donnée a échoué-->";
    die('Erreur :' . $e->getMessage());
}
?>