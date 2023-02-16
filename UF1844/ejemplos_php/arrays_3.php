<?php
$valores = range(1, 10, 1);

print "<pre>"; 
print_r($valores); 
print "</pre>";
//----------------------------------
$uno = [1, 2, 4];
$dos = [1, 3, 9];

$final = array_merge($uno, $dos);

print "<pre>"; 
print_r($final); 
print "</pre>";

$uno = ["a" => 1, "b" => 2, "c" => 4];
$dos = ["a" => 2, "b" => 4, "d" => 6];

$final = array_merge($uno, $dos);

print "<pre>"; 
print_r($final); 
print "</pre>";

echo "Mi array final tiene " . count($final) . " elementos";

echo "<br>";

$datos2 = [
    "pepe"   => [0,5,6,7,8,3,45,76],
    "juan"   => ["peso" => 85, "edad" => 53, "altura" => 1.47],
    "maria"  => ["peso" => 55, "edad" => 45, "altura" => 1.72],
    "ana"    => ["peso" => 55, "edad" => 33, "altura" => 1.69]


];
echo count($datos2); // array principal
echo "<br>";
echo count($datos2, COUNT_RECURSIVE); // todos los elementos del array

//-----------------------------------------
// Ordenar matrices

$valores = [5 => "cinco", 1 => "uno", 9 => "nueve"];



print "<p>Matriz inicial:</p>\n";
print "\n";
print "<pre>\n"; print_r($valores); print "</pre>\n";
print "\n";

sort($valores);

print "<p>Matriz ordenada con sort():</p>\n";
print "\n";
print "<pre>\n"; print_r($valores); print "</pre>\n";
print "\n";


$datos2 = ["peso" => 85, "edad" => 53, "altura" => 1.47];
    

ksort($datos2);


print "<p>Matriz ordenada por keys:</p>\n";
print "\n";
print "<pre>\n"; print_r($datos2); print "</pre>\n";
print "\n";

// Buscar valores en el array

$valores = [10, 40, "15", -1, 10, 40];

print "<pre>\n"; print_r($valores); print "</pre>\n";

if (in_array("15", $valores, true)) {
  print "<p>15 está en la matriz \$valores.</p>\n";
} else {
  print "<p>15 no está en la matriz \$valores.</p>\n";
}
print "\n";

print(array_search(70, $valores));
print "\n";
print_r(array_keys($valores, 10));

// Extraer elemento al azar del array
$cuadrados = [2 => 4, 3 => 9, 7 => 49, 10 => 100];

$key = array_rand($cuadrados);

print "<p>$key</p>\n";
print "<p>" . $cuadrados[$key] . "</p>\n";

// Quitar los valores repetidos
$inicial = [0, 0, 1, 3, 1, 3, 2, 1];

$final = array_unique($inicial);

print "<pre>\n"; print_r($final); print "</pre>\n";
?>