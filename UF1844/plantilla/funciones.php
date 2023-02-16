<?php
function blog($numero_items){

    for($contador = 0; $contador < $numero_items; $contador ++){
        include("articulo.php");
    }

}

function saludar(){
    echo "Hola, tronco, pasa contigo...";
}


?>