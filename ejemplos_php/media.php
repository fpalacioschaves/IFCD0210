<?php

function media_1($numeros){

    $cantidad = count($numeros);
    $suma = 0;

    for($i = 0; $i < $cantidad; $i++){
        $suma = $suma + $numeros[$i];
    }
        $media = $suma / $cantidad;
        return $media;
}

function media_2($numeros){

    $cantidad = count($numeros);
    $suma = 0;

    foreach($numeros as $numero){
        $suma = $suma + $numero;
    }

    $media = $suma / $cantidad;
    return $media;
}


$numeros = [21, 34, 54, 23, 66, 78, 65];

echo media_1($numeros);
echo "<br>";
echo media_2($numeros);
?>