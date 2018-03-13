<?php

function getcity_latlon($cityname,$countryname) {
	$cityname = preg_replace('/\s+/', '+',$cityname);
	$countryname = preg_replace('/\s+/', '+',$countryname);
	$url = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$cityname&sensor=false&region=$countryname&key=AIzaSyBtmiAuZQaFAgfssrfwtyFEQhY2NWzkgJ0");
	$output = json_decode($url);
	$lat  = $output->results[0]->geometry->location->lat; 
    $long = $output->results[0]->geometry->location->lng;
	return $lat."@@@".$long;	
}	
	
	
	
	
	

	$data = file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=8.088306,77.538451&key=AIzaSyBtmiAuZQaFAgfssrfwtyFEQhY2NWzkgJ0&callback=initMap");
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
	
	
		$res_city_latlon=getcity_latlon($city,$country);
		$res_city_latlon_exp=explode("@@@",$res_city_latlon);
		echo $iot_city_latitude=$res_city_latlon_exp[0];
		echo $iot_city_longitude=$res_city_latlon_exp[1];
	
	
?>