<?php
	if(isset($userPermissions['modrecipe'])){
		include_once '1-models/DAO/class.tpj_recipes.php';
		include_once '1-models/DAO/class.tpj_meals.php';
		include_once '1-models/DAO/class.tpj_diets.php';
		include_once '1-models/DAO/class.tpj_countries.php';
		$recipes = new tpj_recipes();
		$meals = new tpj_meals();
		$diets = new tpj_diets();
		$countries = new tpj_countries();
		$redirection;

		$mealsList = $meals->getAll();
		$dietsList = $diets->getAll();
		$countriesList = $countries->getAll();


		if(!isset($_POST['rec_title']) && isset($_GET['id'])) {
			$recipes->get($_GET['id']);
			include_once '2-views/view.container/view.recipes/view.modify-recipes.php';
		} else {
			extract($_POST);

			$recipes->get($rec_id);

			$recipes->rec_title = $rec_title;
			$recipes->rec_link = $rec_link;
			$recipes->rec_tppj = $rec_tppj;
			$recipes->mea_id = $mea_id;
			$recipes->die_id = $die_id;
			$recipes->cou_code = $cou_code;

			if($recipes->update()) {
				var_dump($recipes);
				$redirection = "location: ?page=managerecipes&error=no";
			} else {
				$redirection = "location: ?page=managerecipes&error=updatefail";
			}
			
			header($redirection);
		}
			
	}
?>