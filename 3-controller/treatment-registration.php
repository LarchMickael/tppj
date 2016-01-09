<?php
    include "1-models/conf-form.php";
	extract($_POST);
	var_dump($_POST);
	//Verification et traitement de l'email

	//Verification et traitement de la correspondance du mot de passe
	if($password == $passwordconfirm){
		$motdepasse = sha1($password);
	} else {
		//gérer l'erreur

	}
	
	//Traitement du prenom

	//traitement du nom

	//connexion
	include "1-models/DAO/connexion.php";

	//vérification de non inscription
	$prepCheckUserQuery = $bdd->prepare('SELECT COUNT(user_id) FROM tpj_utilisateur
											WHERE email = :email');
	$prepCheckUserQuery->bindValue(':email', $login, PDO::PARAM_STR);
	$prepCheckUserQuery->execute();
	$checkUserResponse = $prepCheckUserQuery->fetch(PDO::FETCH_NUM);

	echo $checkUserResponse[0];

	if($checkUserResponse[0] == 0){
		//Envoi à la base de donnée
		$prepInsertUserQuery = $bdd->prepare('INSERT INTO tpj_utilisateur(email, motdepasse)
												VALUES (:email, :motdepasse)');
		$prepInsertUserQuery->bindValue(':email', $login, PDO::PARAM_STR);
		$prepInsertUserQuery->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
		$prepInsertUserQuery->execute();
		header('Location: index.php?page=registration&works=true');
	}

?>