<?php

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
		echo $city = $key->long_name;
	  }
	  
	  if($key->types[0] == 'administrative_area_level_1'){
		$state = $key->long_name;
	  }
	  
	  if($key->types[0] == 'country'){
		$country = $key->long_name;
	  }
	  
	}
	
	
?>