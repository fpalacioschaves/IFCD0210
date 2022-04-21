<?php
/* Pillamos el parametro tipo de consulta */
$tipo = $_GET["tipo"];

$id = $_GET["id"]; // Code

if($tipo == "pelicula"){
    $consulta = "SELECT * FROM movies WHERE Code = $id";
}

if($tipo == "cine"){
    $consulta = "SELECT * FROM movietheaters WHERE Code = $id";
}


/* conectamos a la bd */
$conexion = new mysqli("localhost", "root", "", "cines")
or die(mysqli_error($conexion));
$conexion->set_charset("utf8");



$resultado = $conexion->query($consulta)->fetch_all(MYSQLI_ASSOC) or die($conexion->error);
    

$json = json_encode($resultado[0]);

echo $json;


?>