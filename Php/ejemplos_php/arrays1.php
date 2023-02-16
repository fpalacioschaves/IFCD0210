<?php
// Array normal
$coches = array("Volvo", "Peugeot", "Seat", "Renault"); 

// acceder al segundo elemento
echo $coches[1];
echo "<br>";
// recorrer todo el array

// Forma 1

for ( $i = 0 ; $i < count($coches) ; $i++ ) {
    echo $coches[$i];
    echo "<br>";
}

// Forma 2

foreach ( $coches as $coche ){

    echo $coche;
    echo "<br>";
}
