<?php
	include "../conf-form.php";
	include "../DAO/connexion.php";
	$data = $_GET['data'];
	settype($data, 'integer');
	$getUnitQuery = $bdd->prepare('SELECT label
									FROM   tpj_unit
									WHERE  unit_id IN
										(
											SELECT unit_id
											FROM tpj_ingredient
											WHERE ing_id = :id)');
	$getUnitQuery->bindValue(':id', $data, PDO::PARAM_INT);
	$getUnitQuery->execute();
	$unitList = $getUnitQuery->fetch(PDO::FETCH_ASSOC);

	echo $unitList['label'];
	$bdd = null;
 ?>