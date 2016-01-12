<?php 
	if(isset($userPermissions['managerecipes'])) {
		include_once '1-models/DAO/class.tpj_recipes.php';
		include_once '1-models/DAO/class.tpj_recipes_for_courses.php';
		include_once '1-models/DAO/class.tpj_recipes_fit_diets.php';
		include_once '1-models/DAO/class.tpj_recipes_is_meals.php';
		include_once '1-models/DAO/class.tpj_countries.php';
		$recipes = new tpj_recipes();
		$meals = new tpj_recipes_for_courses();
		$diets = new tpj_recipes_fit_diets();
		$diets = new tpj_recipes_is_meals();
		$countries = new tpj_countries();

		$recipesList = $recipes->getAll();
		

		include_once "2-views/view.container/view.recipes/view.manage-recipes.php";
	}

 ?>