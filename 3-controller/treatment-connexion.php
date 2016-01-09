<?php 
	extract($_POST);
	$register = false;
	$correctPass = false;
	//vérification de la présence de l'email dans la bdd
	include "1-models/DAO/connexion.php";
    include "1-models/conf-form.php";
	$prepCheckMailQuery = $bdd->prepare('SELECT COUNT(user_id) FROM tpj_utilisateur
											WHERE email = :login');
	$prepCheckMailQuery->bindValue(':login', $login, PDO::PARAM_STR);
	$prepCheckMailQuery->execute();
	$checkMailResponse = $prepCheckMailQuery->fetch(PDO::FETCH_NUM);
	if($checkMailResponse[0] == 0){
		//Il n'est pas inscrit
		$register = false;
	} else {
		$register = true;
	}

	//vérification que le mot de passe match l'email
	$prepCheckPassQuery = $bdd->prepare('SELECT motdepasse FROM tpj_utilisateur
											WHERE email = :login');
	$prepCheckPassQuery->bindValue(':login', $login, PDO::PARAM_STR);
	$prepCheckPassQuery->execute();
	$checkPassResponse = $prepCheckPassQuery->fetch(PDO::FETCH_ASSOC);

	if($checkPassResponse['motdepasse'] == sha1($password)){
		//le mot de passe match
		$correctPass = true;
	} else {
		$correctPass = false;
	}

	//On récupère les droits
	$prepRightQuery = $bdd->prepare('SELECT label FROM tpj_role
										WHERE role_id IN (
											SELECT role_id FROM tpj_liste_role
												WHERE user_id IN (
													SELECT user_id FROM tpj_utilisateur
														WHERE email = :email))');
	$prepRightQuery->bindValue(':email', $login, PDO::PARAM_STR);
	$prepRightQuery->execute();
	$rightResponse = $prepRightQuery->fetchAll(PDO::FETCH_NUM);
	$rights = array();
	foreach($rightResponse as $key => $value){
		foreach ($value as $index => $label) {
			$rights[$label] = true;
		}
	};

	if ($register == true && $correctPass == true){
		//On créé la session
		$_SESSION['login'] = $login;
		$_SESSION['role'] = $rights;
		header('Location: index.php');
	} else if ($register == false) {
		//proposer inscription
		//header('Location: index.php?page=inscription.php');
	} else {
		//erreur de mot de passe
	}
?>