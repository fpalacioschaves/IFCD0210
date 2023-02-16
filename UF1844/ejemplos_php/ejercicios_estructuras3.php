<?php

$total_compra = 14;

$tipo_compra = "mascotas";

if ( $total_compra < 19 ) { //caso 1
    if ( $tipo_compra == 'mascotas' ) {
       echo 'No se puede realizar el envío';
    } else {
       echo 'Los gastos de envío son 9 euros';
    }
 } else if ( $total_compra >= 19 && $total_compra < 40 ) { //caso 2
     echo 'Los gastos de envío son 9 euros';
 } else if ( $total_compra >= 40 ){ //caso 3
    echo 'Los gastos de envío son gratuítos';
    if ( $total_compra > 200 ) { //caso 4
       echo 'Te has ganado un código de descuento: CODIGODESC33';
    }
 }

 ?>