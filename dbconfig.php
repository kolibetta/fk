<?php
	$db_host = "newflipkartiot.appspot.com";
	$db_name = "newflipkartiot";
	$db_user = "quintaflipkart";
	$db_pass = "quint(%#&^IOT)_3842";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	

	$gaSql['user'] = "quintaflipkart";
	$gaSql['password'] = "quint(%#&^IOT)_3842";
	$gaSql['db'] = "newflipkartiot";
	$gaSql['server'] = "newflipkartiot.appspot.com";
	$conn = mysqli_connect($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);
	
	


?>