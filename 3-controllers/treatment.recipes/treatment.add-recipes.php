<?php
	if(isset($userPermissions['addrecipe'])){
		include_once '1-models/DAO/class.tpj_meals.php';
		include_once '1-models/DAO/class.tpj_courses.php';
		include_once '1-models/DAO/class.tpj_diets.php';
		include_once '1-models/DAO/class.tpj_countries.php';
		$meals = new tpj_meals();
		$courses = new tpj_courses();
		$diets = new tpj_diets();
		$countries = new tpj_countries();
		$redirection;

		$mealsList = $meals->getAll();
		$coursesList = $courses->getAll();
		$dietsList = $diets->getAll();
		$countriesList = $countries->getAll();


		if(!isset($_POST['rec_title'])) {
			include_once '2-views/view.container/view.recipes/view.add-recipes.php';
		} else {
			//On fait l'ajout de la recette
			include_once '1-models/DAO/class.tpj_recipes.php';
			$recipes = new tpj_recipes();
			extract($_POST);

			$recipes->rec_title = $rec_title;
			$recipes->rec_link = $rec_link;
			$recipes->rec_tppj = $rec_tppj;
			$recipes->cou_code = $cou_code;

			if($recipes->add()) {
				//Si l'ajout s'est bien passé on rempli les tables associatives
				$rec_id = $recipes->rec_id;

				//Table tpj_recipes_for_courses
					include_once '1-models/DAO/class.tpj_recipes_for_courses.php';
					$recipes_for_courses = new tpj_recipes_for_courses();
					foreach ($crs_id as $id) {
						$recipes_for_courses->rec_id = $rec_id;
						$recipes_for_courses->crs_id = $id;
						$recipes_for_courses->add();
					}

				//Table tpj_recipes_is_meals
					include_once '1-models/DAO/class.tpj_recipes_is_meals.php';
					$recipes_is_meals = new tpj_recipes_is_meals();
					foreach ($mea_id as $id) {
						$recipes_is_meals->rec_id = $rec_id;
						$recipes_is_meals->mea_id = $id;
						$recipes_is_meals->add();
					}

				//Table tpj_recipes_fit_diets
					include_once '1-models/DAO/class.tpj_recipes_fit_diets.php';
					$recipes_fit_diets = new tpj_recipes_fit_diets();
					//Si le plat est omnivore il ne convient qu'aux omnivores
					if($die_id == 1) {
						$recipes_fit_diets->rec_id = $rec_id;
						$recipes_fit_diets->die_id = 1;
						$recipes_fit_diets->add();					
					}
					//Si le plat est végétarien il convient aux omnivores aussi
					if($die_id == 2) {
						$recipes_fit_diets->rec_id = $rec_id;
						$recipes_fit_diets->die_id = 1;
						$recipes_fit_diets->add();					

						$recipes_fit_diets->rec_id = $rec_id;
						$recipes_fit_diets->die_id = 2;
						$recipes_fit_diets->add();					
					}				
					//Si le plat est végan il convient aux omnivores et végétarien aussi
					if($die_id == 3) {
						$recipes_fit_diets->rec_id = $rec_id;
						$recipes_fit_diets->die_id = 1;
						$recipes_fit_diets->add();

						$recipes_fit_diets->rec_id = $rec_id;
						$recipes_fit_diets->die_id = 2;
						$recipes_fit_diets->add();	
						
						$recipes_fit_diets->rec_id = $rec_id;
						$recipes_fit_diets->die_id = 3;
						$recipes_fit_diets->add();					
					}

				$redirection = "location: ?page=addrecipe&error=no";

			} else {
				$redirection = "location: ?page=addrecipe&error=yes";
			}

			header($redirection);
		}
	}
?>