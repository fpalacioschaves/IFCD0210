<?php

$personas=array(
	"nombre"=>"Jesús",
	"apellidos"=> "Fernández Toledo",
	"Ciudad"=>"Casas de Fernando Alonso"
);

// acceder a los apellidos
echo $personas["apellidos"];
echo "<br>";

// acceder a todo el array

foreach ( $personas as $key => $value ){
    echo $key . " => " . $value. "<br>";
}

echo json_encode($personas);