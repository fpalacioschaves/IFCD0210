<?php
    function tabla($numero){
        for( $i = 0 ; $i <=10 ; $i++ ) {
            echo $i . " * " . $numero . " = " . $i*$numero;
            echo "<br>";
            }
    }

    function todas_tablas(){
        for ($contador = 0 ; $contador <= 10; $contador++){
            tabla($contador);
            echo "<hr>";
        }
    }

    todas_tablas();
?>