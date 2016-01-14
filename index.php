<?php 
    $content_file = file_get_contents('assets/content/content.json');
    $content = json_decode($content_file, TRUE);

    include_once 'helpers/my-library.php';

	session_start();
	if (!isset($_GET['page'])){
		disconnect();
	} else {
		if (isset($_SESSION['id'])) {
			include_once '1-models/DAO/class.tpj_users.php';
			$user = new tpj_users();
			$user->get($_SESSION['id']);
			$userPermissions = $user->getPermissions();
			$userPermissions = array_flip($userPermissions);
		}
		include_once '2-views/head.php';
		include_once '2-views/header.php';
		include_once '2-views/nav.php';

		switch($_GET['page']){
			case 'home':
				include_once '2-views/view.container/home.php';
				break;

			case 'menu': 
				include_once '3-controllers/treatment.menu/treatment.menu.php';
				break;

			case 'managerecipes':
				include_once '3-controllers/treatment.recipes/treatment.manage-recipes.php';
				break;

			case 'addrecipe':
				include_once '3-controllers/treatment.recipes/treatment.add-recipes.php';
				break;

			case 'modrecipe':
				include_once '3-controllers/treatment.recipes/treatment.modify-recipes.php';
				break;

			case 'delrecipe':
				include_once '3-controllers/treatment.recipes/treatment.delete-recipes.php';
				break;

			case 'manageusers':
				include_once '3-controllers/treatment.users/treatment.manage-users.php';
				break;

			case 'profil':
				include_once '3-controllers/treatment.profil.php';
				break;

			case 'connexion':
				include_once '3-controllers/treatment.connexion.php';
				break;

			case 'registration': 
				include_once '3-controllers/treatment.registration.php';
				break;

			case 'generateClass': 
				include_once 'documents/generateClass.php';
				break;

			default:
				disconnect();
				break;
		}

		include_once '2-views/footer.php';
	}

	function disconnect(){
		session_destroy();
		header('location: ?page=home');		
	}
 ?>