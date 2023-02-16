<?php
$nombre_usuario = $_GET["nombre_usuario"];

$verificador = $_GET["verificador"];

// Primer paso: conexion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Crear conexion
$conexion = new mysqli($servername, $username, $password, $dbname);

$sql ="SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'
AND verificador = '$verificador'";

$resultado = $conexion->query($sql);

$numero_resultados = $resultado->num_rows;

if($numero_resultados == 0){
    echo "Algo ha ido mal";
}
else{
    $sql = "UPDATE usuarios SET activo = 1 WHERE nombre_usuario = '$nombre_usuario'";
    $resultado = $conexion->query($sql);
    header("Location:login.php");
}



?>