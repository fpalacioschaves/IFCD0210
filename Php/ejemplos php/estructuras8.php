<?php

$personas = [
    "persona1" =>[
        "nombre" => "Francisco", 
        "apellidos" => "Palacios", 
        "edad" => 54,
        "email" => "fpalacioschaves@gmail.com"
    ],
    "persona2" =>[
        "nombre" => "Manolo", 
        "apellidos" => "Pérez", 
        "edad" => 34,
        "email" => "manolop@gmail.com"
    ],
    "persona3" =>[
        "nombre" => "Antonio", 
        "apellidos" => "López", 
        "edad" => 43,
        "email" => "alopez@gmail.com"
    ],
    "persona4" =>[
        "nombre" => "Lola", 
        "apellidos" => "Martínez", 
        "edad" => 51,
        "email" => "lolamartinez@gmail.com"
    ]
];

foreach ($personas as $clave => $persona){ // foreach que recorre el array principal
    echo "<h1>$clave</h1>";
    //echo $persona["email"];
    foreach($persona as $campo => $valor){
        //if($campo == "email"){
            echo "$campo: $valor <br>";
        //}
    }
    echo "<hr>";

}



?>