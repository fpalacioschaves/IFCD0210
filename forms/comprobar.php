<html>
<head>
<title>Comprobar datos</title> 

</head>
<body>
<h3>Tus Datos de suscripción: </h3>
<p>Estos son los datos que nos has enviado:</p> <pre>
<?php  
	echo "Nombre:    "; echo $_POST['nombre']; echo "<br/>";
	echo "Apellidos: "; echo $_POST['apellidos']; echo "<br/>";
	echo "E-mail:    "; echo $_POST['email']; echo "<br/>";
	echo "UserName:  "; echo $_POST['username']; echo "<br/>";
	echo "UserPass:  "; echo $_POST['userpass']; echo "<br/>";
	echo "Sexo:      "; echo $_POST['sexo']; echo "<br/>";
	echo "Aficiones: "."<br><br>";

// COndicional para validar los temas
	if (isset($_POST['temas'])){
		// Ciclo para mostrar casillas checked checkbox
		foreach($_POST['temas'] as $selected){
			echo "   ".$selected."</br>";//  Imprime resultados.
		}
	}
	echo "</pre>";

echo "Día de la semana: "; echo $_POST['dia']; echo "<br/>";
echo "Tu comentario: "; echo $_POST['comentario']; echo "<br/>";
?>
<p>Comprueba tus datos antes de enviarlos, si no están bien vuelve a escribirlos.</p>
<p>Los datos son correctos: <a href="enviar.php">Enviar</a>
<p>Los datos no son correctos: <a href="suscripcion.php">Volver a escribirlos</a>

</body>
</html>