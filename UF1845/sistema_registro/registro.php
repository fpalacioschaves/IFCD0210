<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>

<form method="POST"  id="formulario_registro">

    Nombre de usuario: <input name="nombre_usuario" type="text" required> 
    <br>
    Password: <input name="password_usuario" type="password" required>
    <br>
    <input type="submit" value="Enviar">
</form>

<?php

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}


   

if($_POST){
    $nombre_usuario = $_POST["nombre_usuario"];
    $password_usuario = $_POST["password_usuario"];

    // Primer paso: existe ya el usuario???
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Crear conexion
    $conexion = new mysqli($servername, $username, $password, $dbname);
    
    // Checkear conexion
    if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
    }

    // Hacer consulta
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";

    $resultado = $conexion->query($sql); // hacemos la consulta y recogemos el resultado
    
    $numero_resultados = $resultado->num_rows;

    if($numero_resultados > 0){

        echo "Ya existe un usuario con ese email. Por favor, verifiquelo o vaya a la página de login";
        
    }

    else{

        $cadena_verificar =  generate_string($permitted_chars, 20);

        $sql = "INSERT INTO usuarios (nombre_usuario, password, verificador, activo)
        VALUES ('$nombre_usuario', '$password_usuario', '$cadena_verificar', 0)";

        $resultado = $conexion->query($sql);

        // enviar email con la url de verificar

        $url_verificacion = "http://localhost/sistema_registro/verificar.php?nombre_usuario=$nombre_usuario&verificador=$cadena_verificar";

        echo $url_verificacion;

        
    }

    


}
?>
    
</body>
</html>