<?php
// foreach array numérico
$numeritos = [0, 1, 10, 100, 1000];
foreach ($numeritos as $numero) {
    //if($numero <= 10){
    //print "<p>$numero</p>\n";
    //}
}

$semana = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"];

// pintar los dias de la semana usando un bucle for

for($contador = 0; $contador < 7; $contador++){
    echo $semana[$contador] . "<br>";
}

// lo mismo usando foreach

foreach($semana as $dia){
    //echo $dia . "<br>";
}

foreach($semana as $indice => $dia){
    echo "$indice $dia <br>";
}

$meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];

foreach($meses as $indice =>$mes){
    echo "$indice $mes <br>";
}

// cambio para testear git
?>