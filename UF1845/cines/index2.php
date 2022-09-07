<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Cartelera de cines</title>
</head>
<body>

<?php
include("funciones.php");

$conexion = conectar_bd();

$consulta = "SELECT * FROM movies LEFT JOIN movietheaters ON movietheaters.Movie = Movies.Code";

$resultado_consulta = $conexion->query($consulta); //hace la consulta

$resultado_consulta->fetch_assoc();

echo "<table class='table table-striped table-hover'>
        <tr>
            <td>Cine</td>
            <td>Título</td>
            <td>Rating</td>
            <td>Recaudación</td>
        </tr>";
foreach($resultado_consulta as $pelicula){
    echo '<tr>
            <td>' . $pelicula["Name"] . '</td>' .
            '<td>' . $pelicula["Title"] . '</td>' .
            '<td>' . $pelicula["Rating"] . '</td>' .
            '<td>' . $pelicula["Money"] . '</td>' .
            '</tr>';
}
echo "<tr>
        <td>Cine</td>
        <td>Título</td>
        <td>Rating</td>
        <td>Recaudación</td>
    </tr>
</table>";


?>
    
</body>
</html>