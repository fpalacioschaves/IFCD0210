<?php

/* Despiezamos la url con parse_url */

/* $_SERVER["REQUEST_URI"]  */


$url = $_SERVER["REQUEST_URI"];
$url_array = explode("/", $url);
$tipo = $url_array[3];
$id = $url_array[4];
if($tipo == "cine"){
    $consulta = "SELECT * FROM movietheaters WHERE Code = $id";
}
if($tipo == "pelicula"){
    $consulta = "SELECT * FROM movies WHERE Code = $id";
}



/* conectamos a la bd */
$conexion = new mysqli("localhost", "root", "", "cines")
or die(mysqli_error($conexion));
$conexion->set_charset("utf8");



$resultado = $conexion->query($consulta)->fetch_all(MYSQLI_ASSOC) or die($conexion->error);
    

$json = json_encode($resultado);

echo $json;


?>