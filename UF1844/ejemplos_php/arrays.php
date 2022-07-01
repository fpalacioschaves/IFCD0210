<?php
$nombres = ["Ana", "Bernardo", "Carmen"];

//echo $nombres[0];
// print_r se suele usar para ver todos los valores del array
echo "<pre>";
print_r($nombres);
echo "</pre>";

$nombres[1] = "Paco";

echo "<pre>";
print_r($nombres);
echo "</pre>";

echo "mi nombre es $nombres[1]";

$edades = ["Andrés" => 20, "Bárbara" => 19, "Camilo" => 17];

print "<p>Bárbara tiene "  . $edades["Bárbara"] . " años</p>\n";

/* Array multidimensional */
$datos = [
    ["nombre" => "pepe", "edad" => 25, "peso" => 80],
    ["nombre" => "juan", "edad" => 22, "peso" => 75]
];

echo $datos[1]["peso"];

echo "<pre>";
print_r($datos);
echo "</pre>";

$datos2 = [
    "pepe"   => ["peso" => 65, "edad" => 43, "altura" => 1.67],
    "juan"   => ["peso" => 85, "edad" => 53, "altura" => 1.47],
    "maria"  => ["peso" => 55, "edad" => 45, "altura" => 1.72],
    "ana"    => ["peso" => 55, "edad" => 33, "altura" => 1.69]


];

echo "<pre>";
print_r($datos2);
echo "</pre>";

?>