<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .ancho{
            width: 800px;
            height: 200px;
            background-color: red;
        }

        .estrecho{
            width: 400px;
            height: 200px;
            background-color: green;
        }

    </style>
    <title>Document</title>
</head>
<body>
    <?php
    $control = 1;
    //$control = 456;

    // If else tradicional
    /*if($control == 1){
        $clase = "estrecho";
    }
    else{
        $clase = "ancho";
    }
    */
    // Operador ternario
    $clase = ($control == 1) ? "estrecho" : "ancho";

    // También vale a la hora de imprimir algo por pantalla
    //echo ($control == 1) ? "estrecho" : "ancho";



    ?>
    <div class="<?php echo $clase;?>">HOLA CARACOLA</div>
    
</body>
</html>