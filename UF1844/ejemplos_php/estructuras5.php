<?php
// Bucle for
    for($i = 0; $i < 5; $i++){
        echo "<p>Hola esto es el parrafo número $i </p>";
    }


// Bucle para los h

for($j = 1; $j <=6; $j++){
    echo "<h$j>Hola mundo</h$j>";
}

// El mismo bucle con while
$contador = 1;
while( $contador <=6){

    echo "<h$contador>Hola mundo</h$contador>";
    $contador++;

}

// El mismo bucle con do while
$contador = 1;
do{
    echo "<h$contador>Hola mundo</h$contador>";
    $contador++;
} while($contador <=6)

?>