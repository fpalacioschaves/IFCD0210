<?php
$datos= file_get_contents("https://reqres.in/api/users/2"); 
$obj= json_decode($datos);
echo "<pre>"; 
var_dump($obj);
echo "</pre>";
?>