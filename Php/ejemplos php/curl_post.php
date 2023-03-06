<?php

//Inicializar curl 
$ch = curl_init(); 
//Url petición 
curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users"); 
//Indicamos que la respuesta se devuelva en la variable y no se mande al navegador 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
//El verbo será POST 
curl_setopt($ch, CURLOPT_POST, 1); 
//Los campos a enviar 
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"name": "Ana", "job": "Developer"}'); 
$result = curl_exec($ch); 
$obj= json_decode($result);
echo "<pre>"; 
var_dump($obj);
echo "</pre>";
?>