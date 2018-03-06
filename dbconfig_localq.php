<?php
	$db_host = "192.168.1.29";
	$db_name = "flipkart";
	$db_user = "remote";
	$db_pass = "quinta@systems";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	

	$gaSql['user'] = "remote";
	$gaSql['password'] = "quinta@systems";
	$gaSql['db'] = "flipkart";
	$gaSql['server'] = "192.168.1.29";
	$conn = mysqli_connect($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);

?>