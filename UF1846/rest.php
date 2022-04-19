<?php
$datos= file_get_contents("https://blockchain.info/ticker"); 
$obj= json_decode($datos); 
echo "<pre>";
print_r($obj); 
echo "</pre>";
?>