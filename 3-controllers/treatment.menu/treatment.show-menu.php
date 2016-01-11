<?php 
	$data = unserialize($_SESSION['data']);

	$nbrJour = $data['periodeData']['nbrJour'];
	$listRec = $data['listRec'];
	$date = Time();
	$weekDay = Date("N", $date);

	//temporaire : la bdd est trop petite

	if(count($listRec) > $nbrJour){
		$listRecTemp = array();
		for($i = 0; $i < $nbrJour; $i++){
			$listRecTemp[0] = $listRec[$i];
		}
		$listRec = $listRecTemp;
	}

	while(count($listRec) < $nbrJour){
		$listRec = array_merge($listRec, $data['listRec']);
	};


	//fin de la prtie temporaire

	$listTitle = array();
	include "1-models/DAO/recipeDAO.php";
	$i = 0;
	foreach ($listRec as $key => $value) {
		//$value = indice recette; on va récupérer les titres

		$listTitle[$i] = array(
			'rec_id' => $value,
			'title' => getRecipeTitle($value)
		);
		$i++;
	};
	$listTitleCounter = 0;
	$endList = count($listTitle);


 ?>