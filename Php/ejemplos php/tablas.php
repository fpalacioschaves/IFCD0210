<?php
function tabla_1($filas){
    echo "<table border=1>";
    for($contador = 0; $contador < $filas; $contador++){
        echo "<tr>
                <td>HOLA CARACOLA</td>
            </tr>";
    }
    echo "</table>";
}

function tabla_2($columnas){
    echo "<table border=1><tr>";
    for($contador = 0; $contador < $columnas; $contador++){
        echo "<td>HOLA CARACOLA</td>";
    }

    echo "</tr></table>";

}

tabla_2(5);
?>
