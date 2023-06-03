<?php
//if latitude and longitude are submitted
if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //send request and receive json data by latitude and longitude
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false&key=AIzaSyAMUFmS_rS9t7swuWQjBeX2wTYSC4MVDsY';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    
    //if request status is successful
    if($status == "OK"){
        //get address from json data
		//print_r($data->results[0]);
        //$location = $data->results[0]->formatted_address;
        $location = $data->results[0]->address_components[0]->short_name.','.$data->results[0]->address_components[1]->short_name;
    }else{
        $location =  '';
    }
    
    //return address to ajax 
    echo $location;
}
?> 