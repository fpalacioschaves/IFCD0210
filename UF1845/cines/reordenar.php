<?php
include("funciones.php");

$conexion = conectar_bd();

$orden = $_GET["orden"];

$consulta = "SELECT * FROM movies ORDER BY Title $orden , Money";

$resultado_consulta = $conexion->query($consulta); //hace la consulta

$resultado_consulta->fetch_assoc();

echo "<tr>
            <td>Título</td>
            <td>Rating</td>
            <td>Recaudación</td>
            <td>Acciones</td>
        </tr>";
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
echo "<tr>
        <td>Título</td>
        <td>Rating</td>
        <td>Recaudación</td>
        <td>Acciones</td>
    </tr>";

?>