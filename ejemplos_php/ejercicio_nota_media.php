<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        width: 50%;
        margin: 0 auto;
        
    }
    td{
        border: 1px solid #ccc;
        text-align: center;
    }

    .par{
        background-color: red;
    }
    .impar{
        background-color: green;
    }
 </style>
<body>
    <?php
    $alumnos = array(
        array("nombre" => "Manolo Pérez", "nota" => 6.5),
        array("nombre" => "Antonio Pérez", "nota" => 8),
        array("nombre" => "María Gómez", "nota" => 9.1),
        array("nombre" => "Manolo Pérez II", "nota" => 7.5),
        array("nombre" => "Antonio Pérez II", "nota" => 9),
        array("nombre" => "María Gómez II", "nota" => 8.1),
        array("nombre" => "Manolo Pérez III", "nota" => 3.5),
        array("nombre" => "Antonio Pérez III", "nota" => 7),
        array("nombre" => "María Gómez III", "nota" => 6.1)
    );
    
    function nota_media($alumnos){
        $numero_alumnos = count($alumnos);
        $suma = 0;
        foreach($alumnos as $alumno){
            $suma = $suma + $alumno["nota"];
        }

        $nota_media = $suma/$numero_alumnos;
        return $nota_media;
    }

    echo "la nota media de la clase es " . nota_media($alumnos);




?>
</body>
</html>