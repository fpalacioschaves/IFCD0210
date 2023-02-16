<?php
$string = '{
    "nombre": "Angelina", 
    "apellido": "Jolie", 
    "edad" : 45
}'; 
echo $string;
$resultado = json_decode($string, true); // devuelve array asociativo
    echo "<pre>";
var_dump($resultado); 

echo $resultado["nombre"];


$resultado2 = json_decode($string, false); // devuelve objeto
    echo "<pre>";
var_dump($resultado2); 
echo "</pre>";

echo $resultado2->nombre;
?>