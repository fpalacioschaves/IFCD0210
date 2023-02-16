<?php
$mi_array =  [
    "nombre" => "Francisco", 
    "apellidos" => "Palacios", 
    "edad" => 54,
    "email" => "fpalacioschaves@gmail.com"
];

foreach($mi_array as $clave => $valor){
    echo "$clave: $valor</br>";
}
?>