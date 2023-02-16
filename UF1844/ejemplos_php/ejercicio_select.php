<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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
    
    function crea_select($alumnos){
        echo "<select>";
        foreach($alumnos as $alumno){ ?>
            
          <option value="<?php echo $alumno["nota"];?>"><?php echo $alumno["nombre"];?></option> 

        <?php
        //echo "<option value='".$alumno["nota"]."'>".$alumno["nombre"]."</option>";
        }

        echo "</select>";
    }

    crea_select($alumnos);
?>
</body>
</html>