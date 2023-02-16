<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST"  id="formulario_login">

    Nombre de usuario: <input name="nombre_usuario" type="text" required> 
    <br>
    Password: <input name="password_usuario" type="password" required>
    <br>
    <input type="submit" value="Enviar">
</form>

<?php
if($_POST){

    $nombre_usuario = $_POST["nombre_usuario"];
    $password_usuario = $_POST["password_usuario"];

     // Primer paso: conexion
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "test";
 
     // Crear conexion
     $conexion = new mysqli($servername, $username, $password, $dbname);

     $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND
     password = '$password_usuario' AND activo = 1";

     

    $resultado = $conexion->query($sql);

    $numero_resultados = $resultado->num_rows;

    if($numero_resultados == 0){
        echo "Hay un error";
    }
    else{
        echo "Bienvenid@, $nombre_usuario";
    }







}


?>
    
</body>
</html>