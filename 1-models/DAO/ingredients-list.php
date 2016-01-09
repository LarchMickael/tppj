<?php
	include "../conf-form.php";
	include "../DAO/connexion.php";
	$getIngredientQuery = $bdd->prepare('SELECT label, ing_id FROM tpj_ingredient');
	$getIngredientQuery->execute();
	$ingredientList = $getIngredientQuery->fetchAll(PDO::FETCH_ASSOC);
	$nbIng = $_GET['data'];

	$content = "";
	$content .= '<div class="comboBoxDiv" name="listIngredients">';
	$content .= "<p><img id='addIngredient' src='http://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/512/add-1-icon.png' alt='Ajouter un ingrédient' title='Ajouter un ingrédient' height='20' width='20' onclick=\"addComboBox()\"></p>";
	$content .= "<p><img id='addIngredient' src='http://icons.iconarchive.com/icons/custom-icon-design/flatastic-1/512/add-1-icon.png' alt='Ajouter un ingrédient' title='Ajouter un ingrédient' height='20' width='20' onclick=\"addComboBox()\"></p>";
	$content .= '<select class="ingredients" name="ingredient'.$nbIng.'" onchange="setUnit(this)">';
	$content .= "<option value=\"\">Ingrédient</option>";	
	foreach ($ingredientList as $key => $value) {
		$content .= '<option value="'.$value['ing_id'].'" >'.$value['label'].'</option>';
	}
	$content .= "</select>";
	$content .= '<input class="input_ingredients_qtt" name="input_ingredients_qtt_'.$nbIng.'" type="number" min="0" max="1000" step="1" value="0" style="width="50px";"/>';
	$content .= '<label class="ingredientUnitLabel"></label>';

	$content .= "</div>";
	echo $content;
	$bdd = null;
 ?>	