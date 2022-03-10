<?php
$agenda_proxima_semana = array(
    "lunes" => "Poner lavadora",
    "martes" => "Limpieza de la casa",
    "miercoles" => "Ir al supermercado",
    "jueves" => "Planchar",
    "viernes" => "Salir con los colegas",
    "sabado" => "Partido de padle",
    "domingo" => "Descansar"
);

$agenda_proximo_mes = array(
    "lunes" => "Poner lavadora 2",
    "martes" => "Limpieza de la casa 2",
    "miercoles" => "Ir al supermercado 2",
    "jueves" => "Planchar 2",
    "viernes" => "Salir con los colegas 2",
    "sabado" => "Partido de padle 2",
    "domingo" => "Descansar 2"
);


function leer_agenda($agenda){
    foreach($agenda as $key=>$value){
        echo "El " . $key . " tengo que " . $value . "<br>";
    }
}

leer_agenda($agenda_proxima_semana);

leer_agenda($agenda_proximo_mes);


?>