<?php
	include_once 'dbconfig.php';
	error_reporting(0);
	
	///get Google map Adrdess//////////////////////////////////////////////////
function getcity_latlon($cityname,$countryname) {
	$cityname = preg_replace('/\s+/', '+',$cityname);
	$countryname = preg_replace('/\s+/', '+',$countryname);
	$url = "https://maps.google.com/maps/api/geocode/json?address=$cityname&sensor=false&region=$countryname&key=AIzaSyBtmiAuZQaFAgfssrfwtyFEQhY2NWzkgJ0";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	curl_close($ch);
	$response_a = json_decode($response);
	$lat = $response_a->results[0]->geometry->location->lat;
	$long = $response_a->results[0]->geometry->location->lng;
	
	return $lat."@@@".$long;	
}		


function getaddress($lat,$lng) {
	$data = file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng&key=AIzaSyBtmiAuZQaFAgfssrfwtyFEQhY2NWzkgJ0");
	$data = json_decode($data);
	$add_array  = $data->results;
	$add_array = $add_array[0];
	$add_array = $add_array->address_components;
	$country = "Not found";
	$state = "Not found"; 
	$city = "Not found";
	$address = "Not found";
	
	
	$address=$data->results[0]->formatted_address;
	
	foreach ($add_array as $key) {
		
		
	  if($key->types[0] == 'administrative_area_level_2'){
		$city = $key->long_name;
	  }
	  
	  if($key->types[0] == 'administrative_area_level_1'){
		$state = $key->long_name;
	  }
	  
	  if($key->types[0] == 'country'){
		$country = $key->long_name;
	  }
	  
	}
	
	return $country."@@@".$state."@@@".$city."@@@".$address;

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
		$iot_datetime=trim($output[0]);
		$iot_latitude=trim($output[1]);
		$iot_longitude=trim($output[2]);
		$iot_batteryvoltage=trim($output[3]);
		$iot_sampling_frequency=trim($output[4]);
		$iot_posting_frequency=trim($output[5]);
		$iot_gpsfixed=trim($output[6]);
		$iot_satellitesfixed=trim($output[7]);
		$iot_imeino=trim($output[8]);
		$iot_power_onoff=trim($output[9]);
		$iot_qrcode=trim($output[10]);
		$created_date=trim(date('Y-m-d H:i:s'));
		
		///////////////GET GOOGLE LAT and LON DETAILS/////////////////////////////////////
		$res_latlon=getaddress($iot_latitude,$iot_longitude);
		$res_exp=explode("@@@",$res_latlon);
		$iot_countryname=$res_exp[0];
		$iot_statename=$res_exp[1];
		$iot_cityname=$res_exp[2];
		$iot_address=$res_exp[3];
	
		$res_city_latlon=getcity_latlon($iot_cityname,$iot_countryname);
		$res_city_latlon_exp=explode("@@@",$res_city_latlon);
		$iot_city_latitude=$res_city_latlon_exp[0];
		$iot_city_longitude=$res_city_latlon_exp[1];		
		///////////////GET GOOGLE LAT and LON DETAILS/////////////////////////////////////
		
	
		
		//echo "INSERT INTO `tbl_iot_details`(`iot_id`, `iot_datetime`, `iot_latitude`, `iot_longitude`, `iot_batteryvoltage`, `iot_sampling_frequency`, `iot_posting_frequency`, `iot_gpsfixed`, `iot_satellitesfixed`, `iot_imeino`, `iot_power_onoff`, `iot_qrcode`, `iot_geolocation`, `iot_address`, `created_date`) 
		//VALUES (NULL, '$iot_datetime', '$iot_latitude', '$iot_longitude', '$iot_batteryvoltage', '$iot_sampling_frequency', '$iot_posting_frequency', '$iot_gpsfixed', '$iot_satellitesfixed', '$iot_imeino', '$iot_power_onoff', '$iot_qrcode', '$iot_geolocation', '$iot_address', '$created_date')";
		
		//////////Insert Query////////////////////////////////////////////////////////////
		$sql_insert_query=mysqli_query($conn, "INSERT INTO `tbl_iot_details`(`iot_id`, `iot_datetime`, `iot_latitude`, `iot_longitude`, `iot_batteryvoltage`, `iot_sampling_frequency`, `iot_posting_frequency`, `iot_gpsfixed`, `iot_satellitesfixed`, `iot_imeino`, `iot_power_onoff`, `iot_qrcode`, `iot_geolocation`, `iot_address`, `iot_cityname`, `iot_statename`, `iot_countryname`, `iot_city_latitude`, `iot_city_longitude`, `created_date`) 
		VALUES (NULL, '$iot_datetime', '$iot_latitude', '$iot_longitude', '$iot_batteryvoltage', '$iot_sampling_frequency', '$iot_posting_frequency', '$iot_gpsfixed', '$iot_satellitesfixed', '$iot_imeino', '$iot_power_onoff', '$iot_qrcode', '$iot_geolocation', '$iot_address',  '$iot_cityname', '$iot_statename', '$iot_countryname', '$iot_city_latitude', '$iot_city_longitude', '$created_date')");
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