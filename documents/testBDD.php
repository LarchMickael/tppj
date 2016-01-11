<?php 
	include_once '1-models/DAO/class.tpj_users.php';
	$user = new tpj_users();

	echo "<br />find tropos <br />";
	var_dump($user->isLoginExist('Tropos'));

	echo "<br />get tropos <br />";
	var_dump($user->getByLogin('Tropos'));

	echo "<br />tropos<br />";
	var_dump($user);
	
	echo "<br /> change tropos<br />";
	$pass = password_hash("pasfounon", PASSWORD_DEFAULT);
	echo "<br /> hash pass<br />";
	echo $pass."<br />";
	$user->use_password = $pass;
	$user->update();
	var_dump($user);

	echo "<br /> new user<br />";
	$user = new tpj_users();
	$user->use_login = "test";
	$user->use_password = "test";
	var_dump($user);

	echo "<br /> ajout <br />";
	var_dump($user->add());

	echo "<br />find test <br />";
	var_dump($user->isLoginExist('test'));

	echo "<br />remove test <br />";
	echo $user->use_id;
	var_dump($user->remove($user->use_id));

	echo "<br />find test <br />";
	var_dump($user->isLoginExist('test'));

	echo " get tropos by id";
	$user = new tpj_users();
	$user->get(1);
	var_dump($user);

 ?>