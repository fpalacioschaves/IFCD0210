<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="formulario" name="formulario" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" 
        value="<?php if(isset($_POST["nombre"])) {echo $_POST["nombre"];}?>">
        <br><br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" 
        value="<?php if(isset($_POST["apellidos"])) {echo $_POST["apellidos"];}?>">
        <br><br>
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad" 
        value="<?php if(isset($_POST["edad"])) {echo $_POST["edad"];}?>">
        <br><br>
        <input type="submit" value="Enviar">

    </form>
</body>
</html>