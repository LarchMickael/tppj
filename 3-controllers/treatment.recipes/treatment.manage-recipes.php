<?php 
	if(isset($userPermissions['managerecipes'])) {
		include_once '1-models/DAO/class.tpj_recipes.php';
		include_once '1-models/DAO/class.tpj_meals.php';
		include_once '1-models/DAO/class.tpj_diets.php';
		include_once '1-models/DAO/class.tpj_countries.php';
		$recipes = new tpj_recipes();
		$meals = new tpj_meals();
		$diets = new tpj_diets();
		$countries = new tpj_countries();

		$recipesList = $recipes->getAll();
		

		include_once "2-views/view.container/view.recipes/view.manage-recipes.php";
	}

 ?>