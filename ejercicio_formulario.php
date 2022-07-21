<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="formulario" method="POST" action="pedidos.php">
    Nombre y apellidos: <input type="text" name="nombre_y_apellidos" required><br>
    Dirección: <input type="text" name="direccion" required><br>
    Teléfono: <input type="text" name="telefono" required><br>
    <hr>
    Patatas <input type="number" name="patatas"><br>
    Cebollas <input type="number" name="cebollas"><br>
    Pimientos <input type="number" name="pimientos"><br>
    Huevos <input type="number" name="huevos"><br>
    Manzanas <input type="number" name="manzanas"><br>

    <input type="submit" value="Hacer pedido">

    </form>
</body>
</html>