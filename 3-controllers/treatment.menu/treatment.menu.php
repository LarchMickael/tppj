<?php
	if(!isset($_POST['die_id'])) {
		include_once '2-views/view.container/view.menu/view.menu.php';
	} else {
        include "1-models/conf-form.php";		
		extract($_POST);
		$morningRecipesList;
		$noonRecipesList;
		$eveningRecipesList;

		if(!empty($die_id)){
			$die_id = clean($die_id);
			settype($die_id, 'integer');
		}
		else {
			$listeErreursForm['regime'][] = "Vous devez préciser le régime voulu";
		}

		//on établi un code pour savoir quel repas prendre en compte. Exemple : 101 => matin et soir
		$codeMenu = "";
		if(!empty($morning)) {
			$codeMenu += "1";
			//On créé le tableau des recettes
			$morningRecipesList = $recipes->getAll('die_id = '.$die_id.' AND mea_id = 1');
		} else
			$codeMenu += "0";
		if(!empty($noon))
			$codeMenu += "1";
		else
			$codeMenu += "0";
		if(!empty($evening))
			$codeMenu += "1";
		else
			$codeMenu += "0";
		
		//on récupère le nombre de jour en fonction de la période choisie
		$periodeData = array();
		switch($periode){
			case 'jour':
				$periodeData = array('nbrJour' => 1, 'label' => $periode);
				break;
			case 'semaine':
				$periodeData = array('nbrJour' => 7, 'label' => $periode);
				break;
			case 'mois':
				$periodeData = array('nbrJour' => 30, 'label' => $periode);
				break;
			default:
				$periodeData = array('nbrJour' => 1, 'label' => $periode);
				break;				
		}

		//  si je n'ai pas d'erreur
		if(sizeof($listeErreursForm) === 0){
			//récupère liste des recettes correspondant au régime sélectionné
			include_once '1-models/DAO/class.tpj_recipes.php';
			$recipes = new tpj_recipes();
			$recipesList = $recipes->getAll('die_id = '.$die_id);

			//On mélange
			shuffle($recipesList);

			//on récupère le nombre de recette voulues

			//requetes préparée
			/*$nbRecQuery = $bdd->prepare('SELECT COUNT(reg_id) FROM tpj_recette
											WHERE reg_id = '.$regime);*/
			$listRecQuery = $bdd->prepare('SELECT rec_id FROM tpj_liste_regime
											WHERE reg_id = :regime');
			$getRegimeIdQuery = $bdd->prepare('SELECT label FROM tpj_regime
												WHERE reg_id = :reg_id');

			var_dump($_POST);

			//Creation de la liste de recette
			/*$nbRecQuery->execute();
			$nbRecResult = $nbRecQuery->fetch(PDO::FETCH_NUM);*/
			$listRecQuery->bindValue(':regime', $regime, PDO::PARAM_INT);
			$listRecQuery->execute();
			$listRecResponse = $listRecQuery->fetchAll(PDO::FETCH_COLUMN);
			shuffle($listRecResponse);
			$data = array(
				'periodeData' => $periodeData,
				'listRec' => $listRecResponse
				);
			$_SESSION['data'] = serialize($data);

			header('Location: index.php?page=show-menu');

			$bdd = null;
		}
	}



	function clean($field){
		$field = trim($field);
		$field = addslashes($field);
		return $field;
	}
?>