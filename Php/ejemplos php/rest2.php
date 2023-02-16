<?php
$datos= file_get_contents("https://reqres.in/api/users/2"); 
$obj= json_decode($datos); 
var_dump($obj);
$datos= file_get_contents("https://reqres.in/api/users"); 
$obj= json_decode($datos);
var_dump($obj);
?>