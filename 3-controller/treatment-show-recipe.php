<?php 
	//renverra la recette formatée
	$rec_id = $_GET['recipe'];
	$fieldTarget = "title, rec_date, portion, duration, instruction";
	include "1-models/DAO/recipeDAO.php";
	$recipe = getRecipeValuesById($fieldTarget, $rec_id);

 ?>