<?php
	if(isset($userPermissions['addrecipe'])){
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


		if(!isset($_POST['rec_title'])) {
			include_once '2-views/view.container/view.recipes/view.add-recipes.php';
		} else {
			extract($_POST);

			$recipes->rec_title = $rec_title;
			$recipes->rec_link = $rec_link;
			$recipes->rec_tppj = $rec_tppj;
			$recipes->mea_id = $mea_id;
			$recipes->die_id = $die_id;
			$recipes->cou_code = $cou_code;

			if($recipes->add()) {
				$redirection = "location: ?page=addrecipe&error=no";
			} else {
				$redirection = "location: ?page=addrecipe&error=yes";
			}

			header($redirection);
		}
	}
?>