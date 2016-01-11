<?php
	if(!isset($_POST['use_login'])) {
		include_once '2-views/view.container/view.connexion.php';	
	} else {
		extract($_POST);
		$redirection;
		$register = false;
		$correctPass = false;
		//vérification de la présence du login dans la bdd
	    include_once "1-models/conf-form.php";
	    include_once "1-models/DAO/class.tpj_users.php";

	    //Récupération du user
	    $user = new tpj_users();
	    $register = $user->getByLogin($use_login);

		//vérification que le mot de passe match l'email
		$correctPass = $user->connectUser($use_login, $use_password);

		if ($register == true && $correctPass == true){
			//On créé la session
			$_SESSION['id'] = $user->use_id;
			$redirection = "location: ?page=home";
		} else if ($register == false)  {
			//erreur 
			$redirection = "location: ?page=connexion&error=register";
		} else if ($correctPass == false) {
			$redirection = "location: ?page=connexion&error=pass";
		}

		header($redirection);

	}
?>