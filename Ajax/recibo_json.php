<?php
if($_POST){
	//echo "recibo algo POST";

	//recibo los datos y los decodifico con PHP
	$misDatosJSON = json_decode($_POST["datos"]);
	
	//con esto podría mostrar todos los datos del JSON recibido
	//print_r($misDatosJSON);

	//ahora muestro algún dato de este array bidimiesional
	$salida = "";
	$salida .= "Capital de Francia: " . $misDatosJSON[1][1];
	$salida .= "<br>Nombre del país 1 (índice 0 del array): " . $misDatosJSON[0][0];
	$salida .= "<br>Nombre del país 3: " . $misDatosJSON[2][0];
	echo $salida;
}else{
	echo "No recibí datos por POST";
}
?>