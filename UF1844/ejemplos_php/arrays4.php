<?php
$personas=array(
	array(
		"nombre"=>"Jesús",
		"apellidos"=> "Fernández Toledo",
		"Ciudad"=>"Casas de Fernando Alonso"
	),
	array(	
		"nombre"=>"Miriam",
		"apellidos"=> "Ortega López",
		"Ciudad"=>"San Clemente"
	),
	array(
		"nombre"=>"Diego",
		"apellidos"=> "Fernández Ortega",
		"Ciudad"=>"Albacete"
	)
);

// acceder a la cadena


// acceder a los datos de Miriam
//print_r($personas[1]);

// recorrer todo el array principal

foreach ($personas as $persona){
    print_r($persona);
    echo "<br>";
}

// acceder a la ciudad en la que vive Diego

echo $personas[2]["Ciudad"];
echo "<br>";

// acceder a los nombres de cada persona

foreach ($personas as $persona){
   echo $persona["nombre"];
   echo "<br>";
}

// acceder a todos los valores de cada persona
foreach($personas as $persona){
     foreach ($persona as $key => $value){
         echo $key . " => " . $value . "<br>";
     }
}

// escribir para cada persona su nombre, apellidos y donde vive en una sola frase
foreach($personas as $persona){
    echo $persona["nombre"] .  " " . $persona["apellidos"] .  " vive en " . $persona["Ciudad"] . "<br>";

}

$json = json_encode($personas);

echo $json;
?>