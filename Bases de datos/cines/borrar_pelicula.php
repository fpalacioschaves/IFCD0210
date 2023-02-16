<?php
include("funciones.php");
$conexion = conectar_bd();
$id_pelicula = $_GET["id_pelicula"];

$consulta = "DELETE FROM movies WHERE Code = $id_pelicula";

$resultado_consulta = $conexion->query($consulta);

header("Location: index.php");




?>