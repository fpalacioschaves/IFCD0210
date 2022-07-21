<?php

$autos = ["Seat", "Ford", "BMW", "Renault"];

// Recorrer con un bucle for
for($contador = 0; $contador < count($autos); $contador++){
    echo "<p>" . $autos[$contador] . "</p>";
}

// Recorrer con un bucle foreach

foreach($autos as $coche){
    echo "<p>" . $coche . "</p>";
}