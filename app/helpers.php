<?php

function curl($url, $method=null, $params=null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   
    if($method == "POST"){
        curl_setopt($curl, CURLOPT_POST, 1);
    }
    
    if($params!=null){
        
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    }
    
    // EXECUTE:
  
    $result = curl_exec($curl);
  
    if(!$result){
        die("Connection Failure");
    }
    curl_close($curl);
    return $result;
}
