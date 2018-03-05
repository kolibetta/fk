<?php
	include_once 'dbconfig.php';
	
//////POST DATA/////////////////////////////////////////////////////////////////////
	//'iot_datetime', 'iot_latitude', 'iot_longitude', 'iot_batteryvoltage', 'iot_sampling_frequency', 'iot_posting_frequency', 'iot_gpsfixed', 'iot_satellitesfixed', 'iot_imeino', 'iot_power_onoff'
	
	$iot_datetime=$_POST["iot_datetime"];
	$iot_latitude=$_POST["iot_latitude"];
	$iot_longitude=$_POST["iot_longitude"];
	$iot_batteryvoltage=$_POST["iot_batteryvoltage"];
	$iot_sampling_frequency=$_POST["iot_sampling_frequency"];
	$iot_posting_frequency=$_POST["iot_posting_frequency"];
	$iot_gpsfixed=$_POST["iot_gpsfixed"];
	$iot_satellitesfixed=$_POST["iot_satellitesfixed"];
	$iot_imeino=$_POST["iot_imeino"];
	$iot_power_onoff=$_POST["iot_power_onoff"];
	$created_date=date('Y-m-d H:i:s');
	
	$address= getaddress($iot_latitude,$iot_longitude);	
	if($address){
		$final_address=explode("@@@",$address);
		$iot_geolocation=$final_address[0];
		$iot_address=$final_address[1];
	}		
	
	//////////Insert Query////////////////////////////////////////////////////////////
	$sql_insert_query=mysqli_query($conn, "INSERT INTO `tbl_iot_details`(`iot_id`, `iot_datetime`, `iot_latitude`, `iot_longitude`, `iot_batteryvoltage`, `iot_sampling_frequency`, `iot_posting_frequency`, `iot_gpsfixed`, `iot_satellitesfixed`, `iot_imeino`, `iot_power_onoff`, `iot_qrcode`, `iot_geolocation`, `iot_address`, `created_date`) 
	VALUES (NULL, '$iot_datetime', '$iot_latitude', '$iot_longitude', '$iot_batteryvoltage', '$iot_sampling_frequency', '$iot_posting_frequency', '$iot_gpsfixed', '$iot_satellitesfixed', '$iot_imeino', '$iot_power_onoff', '$iot_qrcode', '$iot_geolocation', '$iot_address', '$created_date')");
	//////////Insert Query////////////////////////////////////////////////////////////
	
	

//////POST DATA/////////////////////////////////////////////////////////////////////

?>