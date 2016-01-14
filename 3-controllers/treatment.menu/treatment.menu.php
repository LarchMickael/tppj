<?php
	if(!isset($_POST['die_id'])) {
		include_once '2-views/view.container/view.menu/view.menu.php';
		echo "post vide  :   ";
		var_dump($_POST);
	} else {
		echo "post rempli  :   ";
		var_dump($_POST);
        include "1-models/conf-form.php";		
		extract($_POST);

		include_once '1-models/DAO/class.tpj_recipes.php';
		$recipes = new tpj_recipes();

		$morningList;
		$noonList;
			$noonStarterList;
			$noonMainList;
			$noonDessertList;
		$eveningList;
			$eveningStarterList;
			$eveningMainList;
			$eveningDessertList;

		$todayDate = Time();
		$dayOfWeek = Date("N", $todayDate);


		function getGoodSize($array, $size){
			$retArray;
			if (sizeof($array) > $size) {
				while(sizeof($array) > $size) {
					array_shift($array);
				}

				$retArray  = $array;

			} else if (sizeof($array) < $size) {
				while(sizeof($array) < $size) {
					$array = $array.$array;
				}
				$array = getGoodSize($array, $size);
				$retArray = $array;

			} else {
				$retArray = $array;
			}

			return $array;
		}

		function formatArray($array){
			$insertDays = $dayOfWeek - 1;
			for($i = 0; $i < $insertDays; $i++) {
				array_unshift($array, array());
			}
			while(sizeof($array)%7 != 0 ) {
				array_push($array, array());
			}

			return $array;
		}

		function getMorningList($recipes){
			//On Récupère la liste des plats du matin
			$morningList = $recipes->getAll();
			$morningList = getGoodSize($morningList, 30);
			$morningList = formatArray($morningList);

			return $morningList;
		}

		function getNoonList($recipes){
			//On récupère une liste d'entrée du midi
			$noonStarterList = $recipes->getAll();
			$noonStarterList = getGoodSize($noonStarterList, 30);
			$noonStarterList = formatArray($noonStarterList);
			//On récupère une liste de plat du midi
			$noonMainList = $recipes->getAll();
			$noonMainList = getGoodSize($noonMainList, 30);
			$noonMainList = formatArray($noonMainList);
			//On récupère une liste de dessert du midi
			$noonDessertList = $recipes->getAll();
			$noonDessertList = getGoodSize($noonDessertList, 30);
			$noonDessertList = formatArray($noonDessertList);
			//On regroupe le tout
			array_push($noonList, $noonStarterList);
			array_push($noonList, $noonMainList);
			array_push($noonList, $noonDessertList);

			return $noonList;
		}

		function getEveningList($recipes){
			//On récupère une liste d'entrée du midi
			$eveningStarterList = $recipes->getAll();
			$eveningStarterList = getGoodSize($eveningStarterList, 30);
			$eveningStarterList = formatArray($eveningStarterList);
			//On récupère une liste de plat du midi
			$eveningMainList = $recipes->getAll();
			$eveningMainList = getGoodSize($eveningMainList, 30);
			$eveningMainList = formatArray($eveningMainList);
			//On récupère une liste de dessert du midi
			$eveningDessertList = $recipes->getAll();
			$eveningDessertList = getGoodSize($eveningDessertList, 30);
			$eveningDessertList = formatArray($eveningDessertList);
			//On regroupe le tout
			array_push($eveningList, $eveningStarterList);
			array_push($eveningList, $eveningMainList);
			array_push($eveningList, $eveningDessertList);

			return $eveningList;
		}

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
			$morningList = getMorningList($recipes);
		} else {
			$codeMenu += "0";
		}
		if(!empty($noon)) {
			$codeMenu += "1";
			$noonList = getNoonList($recipes);
		} else {
			$codeMenu += "0";
		}
		if(!empty($evening)) {
			$codeMenu += "1";
			$eveningList = getEveningList($recipes);
		} else {
			$codeMenu += "0";
		}
		
		//on récupère le nombre de jour en fonction de la période choisie
		$periodeData = array();
		$periodeData = array('days' => 30, 'label' => "mois");
		/*switch($periode){
			case 'jour':
				$periodeData = array('days' => 1, 'label' => $periode);
				break;
			case 'semaine':
				$periodeData = array('days' => 7, 'label' => $periode);
				break;
			case 'mois':
				$periodeData = array('days' => 30, 'label' => $periode);
				break;
			default:
				$periodeData = array('days' => 1, 'label' => $periode);
				break;				
		}*/


		var_dump($morningList);
		var_dump($noonList);
		var_dump($eveningList);


	}




?>
