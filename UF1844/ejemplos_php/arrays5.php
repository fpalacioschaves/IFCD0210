<?php

$personas=array(
	"persona1" => array(
		"nombre"=>"Jesús",
		"apellidos"=> "Fernández Toledo",
		"Ciudad"=>"Casas de Fernando Alonso"
	),
	"persona2" => array(	
		"nombre"=>"Miriam",
		"apellidos"=> "Ortega López",
		"Ciudad"=>"San Clemente"
	),
	"persona3" => array(
		"nombre"=>"Diego",
		"apellidos"=> "Fernández Ortega",
		"Ciudad"=>"Albacete"
	)
);

// acceder a los datos de Miriam
/*echo "<pre>";
print_r($personas) ;
var_dump($personas);
echo "</pre>";
*/

print_r($personas["persona2"]);
echo "<br>";
// en que ciudad vive Miriam

echo $personas["persona2"]["Ciudad"];
echo "<br>";
// recorrer todo el array $personas
foreach( $personas as $key => $persona){
    echo $key . "<br>";
    print_r($persona);
    echo "<br>";
}




?>