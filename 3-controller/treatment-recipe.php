<?php
	if(isset($_POST) && !empty($_POST)){
        include "1-models/conf-form.php";

		extract($_POST);

		$dietCat = null;
		$prepTime = null;

		//on nettoie le titre et on vérifie sa conformité
		if(!empty($recipe_title)){
			$recipe_title = clean($recipe_title);
			$pattern = "/^(([A-Z][A-Za-z0-9]+\s?)([a-z0-9]+\s?)+)$/";
			if(!preg_match($pattern, $recipe_title)){
				$listeErreursForm['title'][] = "Le titre doit commencer par une majuscule.";
			}
		}
		else
			$listeErreursForm['title'][] = "Vous devez préciser le titre de la recette.";

		//on recupère le nombre de portions
		if(!empty($nbr_pers)){
			$nbr_pers = clean($nbr_pers);
		} else {
			$listeErreursForm['nbr_pers'][] = "Vous devez renseigner un nombre de portions.";
		}

		//on recupère le temps de préparation
		if($prep_time_min == 0 && $prep_time_hour == 0){
			$listeErreursForm['prep_time'][] = "Vous devez renseigner le temps de préparation.";
		} else {
			if($prep_time_hour != 0){
				$prep_time_hour = clean($prep_time_hour);
				$prepTime = $prep_time_hour."h";
			};
			$prep_time_min = clean($prep_time_min);
			$prepTime = $prepTime.$prep_time_min."min";
		}

		//on recupère et on vérifie la liste des ingrédients
		$ingTab = array();
		for($i = 1; $i <= $nbIngredient; $i++ ){
			$ingTab[${'ingredient'.$i}] = ${'input_ingredients_qtt_'.$i};
		}
		//on recupère et on vérifie la liste des instructions
		if(!empty($instructions)){
			$instructions = clean($instructions);
			$pattern = "/^(((-\s)([A-Za-z0-9]+\s?)+)\s?)+/";
			if(!preg_match($pattern, $instructions)){
				$listeErreursForm['instructions'][] = "La liste d'ingrédient est mal formatée.\nExemple : \n- Eplucher les patates\n- Couper les patates.";
			}			
		} else {
			$listeErreursForm['instructions'][] = "Vous devez renseigner la liste des instructions.";
		}

		//on recupère la catégorie
		if(!empty($categorie)){
			$categorie = clean($categorie);

		} else {
			$listeErreursForm['categorie'][] = "Vous devez renseigner la catégorie.";
		}

		//  si je n'ai pas d'erreur
		if(sizeof($listeErreursForm) === 0){
			//traitement du $_POST
            include "1-models/DAO/connexion.php";

			$prepRecInsertQuery = $bdd->prepare('INSERT INTO tpj_recette(title, portion, duration, instruction)
										VALUES (:title, :portion, :duration, :instruction)');
			$prepCheckQuery = $bdd->prepare('SELECT title FROM tpj_recette
												WHERE title = :title');
			$prepIngListInsertQuery = $bdd->prepare('INSERT INTO tpj_liste_ingredient(rec_id, ing_id, quantity)
										VALUES (:rec_id, :ing_id, :quantity)');
			$prepRegListQuery = $bdd->prepare('INSERT INTO tpj_liste_regime(rec_id, reg_id)
												VALUES (:rec_id, :reg_id)');

			$prepCheckQuery->bindValue('title', $recipe_title, PDO::PARAM_STR);
			$prepCheckQuery->execute();

			$isHere = $prepCheckQuery->rowCount();

			try{
				if($isHere == 0) {
					$insertRecResult = $prepRecInsertQuery->execute(array(
							'title' => $recipe_title,
							'portion' => $nbr_pers,
							'duration' => $prepTime,
							'instruction' => $instructions
						));
					$recId = $bdd->lastInsertId();
					foreach ($ingTab as $key => $value) {
						$insertListIngResult = $prepIngListInsertQuery->execute(array(
								'rec_id' => $recId,
								'ing_id' => $key,
								'quantity' => $value
							));
					}
					switch($categorie){
						case "Omnivore":
							$prepRegListQuery->execute(array(
								'rec_id' => $recId,
								'reg_id' => 3
								));
							break;
						case "Vegetalien":
							$prepRegListQuery->execute(array(
								'rec_id' => $recId,
								'reg_id' => 1 //Un omnivore peux manger un plat végétalien
								));
							$prepRegListQuery->execute(array(
								'rec_id' => $recId,
								'reg_id' => 2
								));
							$prepRegListQuery->execute(array(
								'rec_id' => $recId,
								'reg_id' => 3 //Un végétarien peux manger un plat végétalien
								));						
							break;
						case "Vegetarien":
						$prepRegListQuery->execute(array(
							'rec_id' => $recId,
							'reg_id' => 1 //Un omnivore peux manger un plat végétarien
							));
						$prepRegListQuery->execute(array(
							'rec_id' => $recId,
							'reg_id' => 3
							));
						break;
					}
						
				} else {
					echo "Cette recette existe déjà sous ce nom";
				}
			} catch (Exception $e){
				echo "erreur lors de l'insertion : ".$e->getMessage();
			}

			$bdd = null;

		} else {
			var_dump($listeErreursForm);
		}
	}else{
		$listeErreursForm['form'][] = 'Vous devez remplir le formulaire avant de le valider';
		die();
	}
	function clean($field){
		$field = trim($field);
		$field = addslashes($field);
		return $field;
	}
?>