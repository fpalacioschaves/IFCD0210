<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// Primer paso: existe ya el usuario???
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Crear conexion
$conexion = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM usuarios";

$resultado = $conexion->query($sql);

$resultado->fetch_assoc();

foreach($resultado as $usuario){
    echo "Nombre de usuario:". $usuario["nombre_usuario"]."<br>";
    echo "Password:".$usuario["password"]."<br>";
    echo "Actvo:". $usuario["activo"]."<br>";
    echo "Verificador:". $usuario["verificador"]."<br>";
    echo "<hr>";
}

$sql = "SELECT COUNT(*) AS total_usuarios FROM usuarios";

$resultado = $conexion->query($sql);

$resultado->fetch_assoc();

foreach($resultado as $usuario){

    echo "Hay " . $usuario["total_usuarios"] . " usuarios";
    
}




?>
    
</body>
</html>