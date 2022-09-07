<?php

function conectar_bd(){
    $servidor = "localhost"; // servidor que aloja la base de datos
    $usuario_bb_dd = "root"; // usuario base de datos
    $password_bb_dd = ""; // password base de datos
    $base_datos = "cines"; // nombre de la base de datos

    $conexion = new mysqli($servidor, $usuario_bb_dd, $password_bb_dd, $base_datos);
    return $conexion;
}