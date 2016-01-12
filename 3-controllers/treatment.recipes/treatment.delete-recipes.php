<?php 
	if(isset($userPermissions['delrecipe'])) {
		if(isset($_GET['id'])){
			include_once '1-models/DAO/class.tpj_recipes_fit_diets.php';
			include_once '1-models/DAO/class.tpj_recipes_for_courses.php';
			include_once '1-models/DAO/class.tpj_recipes_is_meals.php';
			include_once '1-models/DAO/class.tpj_recipes.php';
			$recipes_fit_diets = new tpj_recipes_fit_diets();
			$recipes_for_courses = new tpj_recipes_for_courses();
			$recipes_is_meals = new tpj_recipes_is_meals();
			$recipes = new tpj_recipes();
			$redirection;

			if($recipes_fit_diets->remove($_GET['id'])) {
				if($recipes_for_courses->remove($_GET['id'])) {
					if($recipes_is_meals->remove($_GET['id'])) {
						if($recipes->remove($_GET['id'])){
							$redirection = "location: ?page=managerecipes&del=yes";
						}
					}
				}
			}

			header($redirection);
		}
	}
 ?>