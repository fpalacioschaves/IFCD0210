<?php
function sumar ( $var1, $var2, $var3 ) {
$suma = $var1 + $var2 + $var3;

return $suma;
}

function multiplicar ( $num1, $num2 ) {
return $num1 * $num2;
}

$suma = sumar(3,6,9);

echo $suma;

echo "<br>";

$multiplicacion = multiplicar ( 3, 9 ) ;

echo $multiplicacion;
?>