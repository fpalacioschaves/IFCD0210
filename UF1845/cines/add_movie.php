<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <title>Añadir película</title>
</head>
<body>

<form method="POST">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" required class="form-control">

    <br>

    <label for="rating" class="form-label">Rating</label>
    <select name="rating" class="form-control">
        <option value="-1" disabled selected>Seleccione una opción</option>
        <option value="PG">PG</option>
        <option value="G">G</option>
        <option value="NC-17">NC-17</option>
        <option value="PG-13">PG-13</option>
    </select>

    <br>

    <label for="money" class="form-label">Money</label>
    <input type="number" name="money" class="form-control">

    <input type="submit" class="btn btn-primary" value="Añadir película">


</form>

<?php
    include("funciones.php");

    if($_POST){
        $titulo = $_POST["titulo"];
        $rating = $_POST["rating"];
        $recaudacion = $_POST["money"];

        $conexion = conectar_bd();

        $consulta = "INSERT INTO movies (Title, Rating, Money)
        VALUES ('$titulo', '$rating', $recaudacion)";

        $resultado_consulta = $conexion->query($consulta);

        header("Location: index.php");




    }

?>
    
</body>
</html>