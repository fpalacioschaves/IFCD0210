<?php
include("funciones.php");

$conexion = conectar_bd();

$orden = $_GET["orden"];

$consulta = "SELECT * FROM movies ORDER BY Rating $orden , Money";

$resultado_consulta = $conexion->query($consulta); //hace la consulta

$resultado_consulta->fetch_assoc();

foreach($resultado_consulta as $pelicula){
    echo '<tr>'.
            '<td>' . $pelicula["Title"] . '</td>' .
            '<td>' . $pelicula["Rating"] . '</td>' .
            '<td>' . $pelicula["Money"] . '</td>' .
            '<td>
            <a href="editar_pelicula.php?id_pelicula='.$pelicula["Code"].'">Editar</a>
             - 
            <a href="borrar_pelicula.php?id_pelicula='.$pelicula["Code"].'">Borrar</a>
             </td>' .
            '</tr>';
}
?>