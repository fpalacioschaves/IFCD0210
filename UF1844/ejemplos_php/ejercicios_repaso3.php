<?php

$cadena = "a-a-r-e-f-a";

// Substituir a por tortuga

$cadena = str_replace("a", "tortuga", $cadena);

echo $cadena;

// Separar por "-"

$mi_array = explode("-", $cadena);

var_dump($mi_array);

// Longitud del array

echo count($mi_array);