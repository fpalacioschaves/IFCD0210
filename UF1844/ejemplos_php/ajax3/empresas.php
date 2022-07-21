<?php


$dbserver = "localhost";
$dbuser = "root";
$password = "";
$dbname = "gestion_practicas";
 
$conexion = new mysqli($dbserver, $dbuser, $password, $dbname);

	if($conexion->connect_errno) {
                die("No se pudo conectar a la base de datos");
	}


	

	
$consulta = $conexion->query( "SELECT nombre_empresa FROM `empresas`");

$resultado = $consulta->fetch_all(MYSQLI_ASSOC);

$conexion->close();
		
header('Content-type: application/json; charset=utf-8');

echo json_encode($resultado, JSON_FORCE_OBJECT);
	
$consulta->close();
	
exit();

?>