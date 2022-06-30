<?php

$cad = "cadena"; //Prueba a cambiar el texto cadena por otro

$n = strlen($cad); // devuelve longitud de la cadena

echo "La longitud de la cadena es: " . $n . "<br>"; // concatenar cadenas

echo "La longitud de la cadena es: $n<br>"; // valor de la variable dentro de ""

echo 'La longitud de la cadena es: $n<br>'; // No funciona con ''

//-------------------------------------------------------------//

$cad = "cadena";

$sub1 = substr($cad, 2);

$sub2 = substr($cad, 2, 2);

echo "La subcadena número uno es la siguiente: $sub1 <br />";
// Desde la posición 2 hasta el final

echo "La subcadena número dos es la siguiente: $sub2 <br>";
// Desde la posición 2 y dos caracteres

//-------------------------------------------------------------//


$cad = "aprenderaprogramar.com";

$sub1 = substr($cad, 0);

$sub2 = substr($cad, 0, 8); 

$sub3 = substr($cad, 8, 1); 

$sub4 = substr($cad, 9); 

echo "La subcadena número uno es la siguiente: $sub1 <br />";

echo "La subcadena número dos es la siguiente: $sub2 <br />";

echo "La subcadena número tres es la siguiente: $sub3 <br />";

echo "La subcadena número cuatro es la siguiente: $sub4 <br />";

//-------------------------------------------------------------//

$texto = "Donde dije digo digo Diego.";

echo str_replace("Diego", "recortes", $texto);

echo "<br />";

echo $texto;

echo "<br />";

$texto = "El dijo: es tarde ahora, pero es mejor si hay tres";

echo str_replace("es", "**", $texto, $reemplazos );

echo '<br/>Se han realizado: '.$reemplazos. ' reemplazos<br/>';

echo $texto . "<br/>";

//-------------------------------------------------------------//

$cadena = "EstO eS UnA cadeNA de CARActeres";

echo strtolower($cadena);

echo "<br />";

echo strtoupper($cadena);

echo "<br />";

//-------------------------------------------------------------//

$cadena = 'es jueves';

$miArray = count_chars ( $cadena, 4); // función un poquito gilipollas

echo "<pre>";
var_dump($miArray);
echo "</pre>";

/*----------------------------------------------------------*/

$cadena1 = 'Pedro Juan Luis Marco Luis Pedro Juan Luis Pedro';

$cadena2 = 'Antonio';

echo 'Antonio aparece '.substr_count($cadena1, $cadena2). ' veces';

/*----------------------------------------------------------*/

$saludo = "hoy es viernes";

echo strpos($saludo, "es");
echo "<br />";
/*-------------------------------------------------------*/

$cadena = "Esto es una cadena más larga";

$array = explode(" ", $cadena);

var_dump($array);
?>

