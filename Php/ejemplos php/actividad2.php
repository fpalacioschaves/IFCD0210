<?php

$numeros =[1,5,85,41,5,7,89,6,5,7,4,123,6,69,547,13];


function calculo($numeros){
    
    $suma=0;
    
    for($i=0;$i<$numeros.count;$i++){
        $suma=$suma+$numero[i];
    }
    
    $media=$suma/$numeros.count;
    
    //maximo
  $max=$numeros[0];
  $min=$numeros[0];

  for($i=0;$i<$numeros.count;$i++){
      if($numeros[i]>$max){
          $max=$numero[i];
      }
  }
   // minimo
  for($i=0;$i<$numeros.count;$i++){
    if($numeros[i]<$min){
        $min=$numero[i];
    }
  }

  echo "La media es: ".$media ." El max es: ".$max." El min es: ".$min;
}

?>