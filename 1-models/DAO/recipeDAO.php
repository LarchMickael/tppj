<?php

function getRecipeTitle($recId){
	include "1-models/DAO/connexion.php";

	$prepGetTitleQuery = $bdd->prepare('SELECT title FROM tpj_recette
										WHERE rec_id = '.$recId);
	$prepGetTitleQuery->execute();
	$recTitle = $prepGetTitleQuery->fetch(PDO::FETCH_COLUMN);
	return $recTitle;
}

function getRecipeValuesById($fieldsTarget, $id) {
	include "1-models/DAO/connexion.php";

	$prepGetRecipeValuesQuery = $bdd->prepare("SELECT $fieldsTarget FROM tpj_recette
												WHERE rec_id = :id");

	settype($id, 'integer');

	$prepGetRecipeValuesQuery->bindValue(':id', $id, PDO::PARAM_STR);
	$prepGetRecipeValuesQuery->execute();
	$Recipe = $prepGetRecipeValuesQuery->fetch(PDO::FETCH_ASSOC);
	return $Recipe;
}

?>