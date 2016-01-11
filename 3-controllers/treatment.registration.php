<?php
    include_once "1-models/conf-form.php";
    include_once "1-models/DAO/class.tpj_users.php";
    if(!isset($_POST['use_login'])){
    	include_once '2-views/view.container/view.registration.php';
    } else {

	    $redirection;
		extract($_POST);

		//Verification et traitement de la correspondance du mot de passe
		if($use_password == $passwordconfirm){
			$hashPassword = password_hash($use_password, PASSWORD_DEFAULT);
			//Verification et traitement de l'email
			
			//Traitement du prenom

			//traitement du nom

			//vérification de non inscription
			$user = new tpj_users();

			if($user->getBylogin($use_login)) {
				//On dit qu'il est déjà inscrit
				$redirection = "location: ?page=registration&works=false&prob=existlogin";
			} else {
				$user->use_login = $use_login;
				$user->use_password = $hashPassword;
				if(isset($use_lastname)){
					$user->use_lastname = $use_lastname;
				}
				if(isset($use_firstname)){
					$user->use_firstname = $use_firstname;
				}
				if($user->add()){
					//Bravo bien enregistré
					$redirection = "location: ?page=registration&works=true";
				} else {
					//erreur lors de l'inscription merci de recommencer
					$redirection = "location: ?page=registration&works=false&prob=addfail";
				}
			}

		} else {
			//gérer l'erreur
			$redirection = "location: ?page=registration&works=false&prob=passnotmatch";
		}
		
		header($redirection);

    }

?>