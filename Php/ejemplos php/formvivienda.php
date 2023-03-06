<?php
$tipo = $_POST['vivienda'];

$zona = $_POST['zona'];
$habitaciones = $_POST['habitaciones'];
$precio = $_POST['precio'];
$tamano = $_POST['tamano'];




$garaje = $_POST['Garaje'];

$garaje = isset($_POST['Garaje']) ? $_POST["Garage"] : "";





if(isset($_POST["trastero"])){
    $trastero = $_POST['Trastero'];
}

$piscina = $_POST['Piscina'];
$observaciones = $_POST['observaciones'];
echo "<h2>Inserción de vivienda</h2>";
if ($tipo == NULL || $precio == NULL) {
    echo "Debes introducir el tipo de vivienda y su precio<br>";
} else {
    echo "<h3>Los datos introducidos son: </h3>";
    echo "El tipo de vivienda elegido es $tipo<br>";
    if ($zona) {
        echo "La zona seleccionada es $zona<br>";
    }
    
    if ($habitaciones) {
        echo "La casa cuenta con $habitaciones habitaciones<br>";
    }
    echo "Su precio es $precio €<br>";
    echo "Extras: ";
    if ($garaje) {
        echo "$garaje,";
    }
    if (isset($trastero)) {
        echo "$trastero,";
    }
    if ($piscina) {
        echo "$piscina.";
    }
    if ($observaciones) {
        echo "<br>Observaciones: $observaciones<br>";
    }
}
echo "<a href='ejercicio_form_vivienda.php'>Volver al formulario</a>";
