<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="scripts.js"></script>
    <title>Cartelera de cines</title>
</head>
<body>

<a href="add_movie.php" class="btn btn-success">Añadir película</a>
Ordenar películas:
<select name="ordenar" id="ordenar" onchange="ordenar();">
    <option value="asc">ASC</option>
    <option value="desc">DESC</option>
</select>
<?php
include("funciones.php");

$conexion = conectar_bd();

$consulta = "SELECT * FROM movies ORDER BY Title, Money";

$resultado_consulta = $conexion->query($consulta); //hace la consulta

$resultado_consulta->fetch_assoc();

echo "<table class='table table-striped table-hover' id='tabla_cines'>
        <tr>
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
    </tr>
</table>";


?>
    
</body>
</html>