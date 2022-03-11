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
    function genera_tabla($filas, $columnas){
    ?>
    <table border="1" style="width: 100%;">
        <?php
            for ($contador = 0; $contador < $filas; $contador++){
                echo "<tr>";

                for ( $contador2 = 0; $contador2 < $columnas; $contador2++){
                    echo "<td>" . $contador . "," . $contador2 . "</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
    <?php
    }
?>
    
<?php genera_tabla(3,4); ?>

<?php genera_tabla(6,2); ?>


</body>
</html>