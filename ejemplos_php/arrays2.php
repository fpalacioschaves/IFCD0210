<?php
$marcas = array(
    "Hola caracola",
    25,
    array("Volvo", "Peugeot", "Seat", "Renault"),
    array("Yamaha", "Ducati", "Honda", "Derbi"),
    array("Zara", "H&M", "Springfield", "Mango"),
    array("Nike", "Adidas", "Puma", "New Balance")
);

// acceder a las marcas de motos
print_r($marcas[3]);
echo "<br>";
// acceder a la tercera marca de ropa

echo $marcas[4][2];
echo "<br>";
// acceder al 25

echo $marcas[1];
echo "<br>";

// acceder a la cadena

echo $marcas[0];
echo "<br>";