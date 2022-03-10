<?php
function blog($numero_items){

    for($contador = 0; $contador < $numero_items; $contador ++){
        include("articulo.php");
    }

}


?>