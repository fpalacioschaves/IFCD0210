<?php

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users/2"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE"); 
$result = curl_exec($ch);
echo "<pre>"; 
var_dump($result);
echo "</pre>";
?>