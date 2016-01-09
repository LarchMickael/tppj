<?php
	if(isset($_POST) && !empty($_POST)){
        include "1-models/conf-form.php";		
		extract($_POST);

		if(!empty($regime)){
			$regime = clean($regime);
			settype($regime, 'integer');
		}
		else
			$listeErreursForm['regime'][] = "Vous devez préciser le régime voulu";

		//on établi un code pour savoir quel repas prendre en compte. Exemple : 101 => matin et soir
		$codeMenu = "";
		if(!empty($morning))
			$codeMenu += "1";
		else
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
			//traitement du $_POST
			include "1-models/DAO/connexion.php";
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