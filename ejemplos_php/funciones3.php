<?php
function calculo($radio){
    $area = pi() * $radio^2;
    $longitud = 2 * pi() * $radio;

    /*$resultado = array($longitud, $area);*/

    $resultado = array(
        "longitud" => $longitud, 
        "area" => $area
    );
    
    return $resultado;

}

$calculo_circulo = calculo(10);


echo "El área de mi circunferencia es " . $calculo_circulo["area"];

echo "<br>";

echo "La longitud de mi circunferencia es " . $calculo_circulo["longitud"];




?>