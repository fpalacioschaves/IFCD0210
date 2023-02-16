<?php
$datos= file_get_contents("https://blockchain.info/ticker"); 
$obj= json_decode($datos); 
print_r($obj); 
?>