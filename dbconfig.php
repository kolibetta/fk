<?php
	$db_host = "localhost";
	$db_name = "flipkart";
	$db_user = "root";
	$db_pass = "";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	

	$gaSql['user'] = "root";
	$gaSql['password'] = "";
	$gaSql['db'] = "flipkart";
	$gaSql['server'] = "localhost";
	$conn = mysqli_connect($gaSql['server'], $gaSql['user'], $gaSql['password'], $gaSql['db']);
	
	
///get Google map Adrdess//////////////////////////////////////////////////
function getaddress($lat,$lng)
  {
     $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
	   $full_address=$data->results[0]->formatted_address;
       $state=$data->results[7]->formatted_address;
	   return $full_address."@@@".$state;
     }
     else
     {
       return false;
     }
  }	
////////////////////////////////////////////////////////////////////////////	

?>