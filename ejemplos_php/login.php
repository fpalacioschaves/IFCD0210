<?php
session_start();

$_SESSION["usuario"] = $_POST["usuario"];
$_SESSION["password"] = $_POST["password"];

?>

<a href="ejercicio_sesion1.php">Volver</a>