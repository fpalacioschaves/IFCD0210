<?php
    $saludo = "<b>Hola mundo</b>";
    // Esto es una variable con un entero
    $mi_telefono = 655925498;

    /* Este
    es
    un
    comentario
    de más de una linea
    */
    $mi_telefono2 = '655925498';

    $cadena = $saludo . " " . $mi_telefono2;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?php //echo $cadena; 
        for($contador = 0; $contador < 10; $contador++){
            echo $contador . "<br>";
        }
        
        ?>
    </p>
</body>
</html>