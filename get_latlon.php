<?php
  function getaddress($lat,$lng)
  {
     $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
	   $full_address=$data->results[0]->formatted_address;
       $state=$data->results[8]->formatted_address;
	   return $full_address."@@@".$state;
     }
     else
     {
       return false;
     }
  }

  $lat= 18.92488028662047; //latitude
  $lng= 72.8232192993164; //longitude
  $address= getaddress($lat,$lng);
  
  if($address)
  {
    echo $address;
  }
  else
  {
    echo "Not found";
  }
?>