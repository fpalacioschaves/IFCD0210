<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nombre, apellidos FROM alumnos";
$result = $conn->query($sql);
$result->fetch_assoc();

foreach($result as $item){

    echo "Nombre del alumno: " . $item["nombre"] . "<br>";
    echo "Apellidos del alumno: " . $item["apellidos"] . "<br>";

}

?>
