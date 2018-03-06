<?php
	include_once 'dbconfig.php';
	
	
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
	
//////POST DATA/////////////////////////////////////////////////////////////////////
	//'iot_datetime', 'iot_latitude', 'iot_longitude', 'iot_batteryvoltage', 'iot_sampling_frequency', 'iot_posting_frequency', 'iot_gpsfixed', 'iot_satellitesfixed', 'iot_imeino', 'iot_power_onoff'
	$json_data = array(
		"status" => 0,
		"POST_DATA" => isset($_POST) ? $_POST : array(),
	);
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		$output=explode("~",file_get_contents("php://input"));
		$iot_datetime=$output[0];
		$iot_latitude=$output[1];
		$iot_longitude=$output[2];
		$iot_batteryvoltage=$output[3];
		$iot_sampling_frequency=$output[4];
		$iot_posting_frequency=$output[5];
		$iot_gpsfixed=$output[6];
		$iot_satellitesfixed=$output[7];
		$iot_imeino=$output[8];
		$iot_power_onoff=$output[9];
		$iot_qrcode=$output[10];
		
		$created_date=date('Y-m-d H:i:s');
		
		$address= getaddress($iot_latitude,$iot_longitude);	
		if($address){
			$final_address=explode("@@@",$address);
			$iot_geolocation=$final_address[0];
			$iot_address=$final_address[1];
		}		
		
		//echo "INSERT INTO `tbl_iot_details`(`iot_id`, `iot_datetime`, `iot_latitude`, `iot_longitude`, `iot_batteryvoltage`, `iot_sampling_frequency`, `iot_posting_frequency`, `iot_gpsfixed`, `iot_satellitesfixed`, `iot_imeino`, `iot_power_onoff`, `iot_qrcode`, `iot_geolocation`, `iot_address`, `created_date`) 
		//VALUES (NULL, '$iot_datetime', '$iot_latitude', '$iot_longitude', '$iot_batteryvoltage', '$iot_sampling_frequency', '$iot_posting_frequency', '$iot_gpsfixed', '$iot_satellitesfixed', '$iot_imeino', '$iot_power_onoff', '$iot_qrcode', '$iot_geolocation', '$iot_address', '$created_date')";
		
		//////////Insert Query////////////////////////////////////////////////////////////
		$sql_insert_query=mysqli_query($conn, "INSERT INTO `tbl_iot_details`(`iot_id`, `iot_datetime`, `iot_latitude`, `iot_longitude`, `iot_batteryvoltage`, `iot_sampling_frequency`, `iot_posting_frequency`, `iot_gpsfixed`, `iot_satellitesfixed`, `iot_imeino`, `iot_power_onoff`, `iot_qrcode`, `iot_geolocation`, `iot_address`, `created_date`) 
		VALUES (NULL, '$iot_datetime', '$iot_latitude', '$iot_longitude', '$iot_batteryvoltage', '$iot_sampling_frequency', '$iot_posting_frequency', '$iot_gpsfixed', '$iot_satellitesfixed', '$iot_imeino', '$iot_power_onoff', '$iot_qrcode', '$iot_geolocation', '$iot_address', '$created_date')");
		//////////Insert Query////////////////////////////////////////////////////////////
		if($sql_insert_query){
			$json_data["status"] = 1;
		}
		echo json_encode($json_data);
		return;
	}
	echo json_encode($json_data);
	return;

//////POST DATA/////////////////////////////////////////////////////////////////////

?>