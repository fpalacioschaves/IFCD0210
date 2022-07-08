<?php

$dia_ingles = Date("D");

if ($dia_ingles == 'Mon') {
    echo 'Lunes';
} else if ($dia_ingles == 'Tue') {
    echo 'Martes';
} else if ($dia_ingles == 'Wed') {
    echo 'Miércoles';
} else if ($dia_ingles == 'Thu') {
    echo 'Jueves';
} else if ($dia_ingles == 'Fri') {
    echo 'Viernes';
} else { //por descarte es Sábado o Domingo
    echo 'Fin de semana';
}

switch ($dia_ingles) {
    case "Mon":
        echo "Es lunes";
        break;
    case "Tue":
        echo "Es martes";
        break;
    case "Wed":
        echo "Es miércoles";
        break;
    case "Thu":
        echo "es Jueves";
        break;
    case "Fri":
        echo "Es Viernes";
        break;
    default:
        echo "Es fin de semana";
        break;
}
