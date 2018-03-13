<?php
	$db_host = "35.200.219.50";
	$db_name = "newflipkartiot";
	$db_user = "root";
	$db_pass = "quinta@123";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	

	$gaSql['server'] = "35.200.219.50";
	$gaSql['db'] = "newflipkartiot";
	$gaSql['user'] = "root";
	$gaSql['password'] = "quinta@123";
	$conn = mysqli_connect($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);
	
	


?>
