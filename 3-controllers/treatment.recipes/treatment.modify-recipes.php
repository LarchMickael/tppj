<?php
	if(isset($userPermissions['modrecipe'])){
		include_once '1-models/DAO/class.tpj_meals.php';
		include_once '1-models/DAO/class.tpj_diets.php';
		include_once '1-models/DAO/class.tpj_courses.php';
		include_once '1-models/DAO/class.tpj_countries.php';
		$meals = new tpj_meals();
		$diets = new tpj_diets();
		$courses = new tpj_courses();
		$countries = new tpj_countries();
		$redirection;

		$mealsFullList = $meals->getAll();
		$dietsFullList = $diets->getAll();
		$coursesFullList = $courses->getAll();
		$countriesFullList = $countries->getAll();


		if(!isset($_POST['rec_title']) && isset($_GET['id'])) {
			include_once '1-models/DAO/class.tpj_recipes.php';
			$recipes = new tpj_recipes();
			$recipes->get($_GET['id']);

			//On récupère tous les repas associés
			include_once '1-models/DAO/class.tpj_recipes_is_meals.php';
			$tpj_recipes_is_meals = new tpj_recipes_is_meals();
			$mealsList = $tpj_recipes_is_meals->getAllMeals($_GET['id']);

			//On récupère tous les régimes associés
			include_once '1-models/DAO/class.tpj_recipes_fit_diets.php';
			$tpj_recipes_fit_diets = new tpj_recipes_fit_diets();
			$dietsList = $tpj_recipes_fit_diets->getAllDiets($_GET['id']);			

			//On récupère tous les plats associés
			include_once '1-models/DAO/class.tpj_recipes_for_courses.php';
			$tpj_recipes_for_courses = new tpj_recipes_for_courses();
			$coursesList = $tpj_recipes_for_courses->getAllCourses($_GET['id']);

			include_once '2-views/view.container/view.recipes/view.modify-recipes.php';
		} else {
			extract($_POST);

			include_once '1-models/DAO/class.tpj_recipes.php';
			$recipes = new tpj_recipes();
			$recipes->get($rec_id);

			$recipes->rec_title = $rec_title;
			$recipes->rec_link = $rec_link;
			$recipes->rec_tppj = $rec_tppj;
			$recipes->cou_code = $cou_code;

			if($recipes->update()) {

				//Si l'update s'est bien passé on supprime les anciens enregistrement puis on rempli les tables associatives
				$rec_id = $recipes->rec_id;

				//Table tpj_recipes_for_courses
					include_once '1-models/DAO/class.tpj_recipes_for_courses.php';
					$recipes_for_courses = new tpj_recipes_for_courses();
					$recipes_for_courses->remove($rec_id);
					foreach ($crs_id as $id) {
						$recipes_for_courses->rec_id = $rec_id;
						$recipes_for_courses->crs_id = $id;
						$recipes_for_courses->add();
					}

				//Table tpj_recipes_is_meals
					include_once '1-models/DAO/class.tpj_recipes_is_meals.php';
					$recipes_is_meals = new tpj_recipes_is_meals();
					$recipes_is_meals->remove($rec_id);
					foreach ($mea_id as $id) {
						$recipes_is_meals->rec_id = $rec_id;
						$recipes_is_meals->mea_id = $id;
						$recipes_is_meals->add();
					}

				//Table tpj_recipes_fit_diets
					include_once '1-models/DAO/class.tpj_recipes_fit_diets.php';
					$recipes_fit_diets = new tpj_recipes_fit_diets();
					$recipes_fit_diets->remove($rec_id);
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
				$redirection = "location: ?page=managerecipes&error=no";
			} else {
				$redirection = "location: ?page=managerecipes&error=updatefail";
			}
			
			header($redirection);
		}
			
	}
?>