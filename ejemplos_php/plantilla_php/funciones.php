<?php
/*function pinta_banner($n){
    for($i = 0; $i < $n; $i++){
        include("banner.php");
    }
}

function pinta_mas_vendidos($n){
    for ($i = 0; $i < $n; $i++) {
        include("card_mas_vendidos.php");
    }
}

function pinta_novedades($n){
    for ($i = 0; $i < $n; $i++) {
        include("card_novedades.php");
    }
}
*/
function pintar($n,$file){
    for ($i = 0; $i < $n; $i++) {
        include($file);
    }

}

?>