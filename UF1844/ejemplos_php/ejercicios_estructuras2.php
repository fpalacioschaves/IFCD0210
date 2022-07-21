<?php

$total_compra = 100;

if($total_compra < 30){
    echo "<strong>Compra más o te cobraremos los abusivos 30 euros de gastos de envío</strong";
}
elseif($total_compra >= 90){
    echo "<strong>Sí sí sí! Gastos de envío incluidos ¡Vuelve pronto!'</strong>";
}
else{
    $resto = 90 - $total_compra;
    echo "Te faltan $resto para tener gastos de envío gratis";
}




?>

