<?php
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users/2"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PUT"); 
//curl_setopt($ch, CURLOPT_PUT, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"name": "Ana", "job": "Developer"}'); 
$result = curl_exec($ch);
$obj= json_decode($result); 
echo "<pre>"; 
var_dump($obj);
echo "</pre>";
?>