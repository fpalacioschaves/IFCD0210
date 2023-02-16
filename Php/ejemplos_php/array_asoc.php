<?php
$aColores = array( 
    "color1" => "rojo", 
    "color2" => "verde", 
    "color3" => "azul" 
);

$aCosas = array( 
    "color1" => "rojo", 
    "importe" => 300, 
    "activo" => true, 
    3 => 55 );


echo "Color 3: [".$aColores["color3"]."]<br/>";
echo "Activo: [".$aCosas["activo"]."]<br/>";
echo "3: [".$aCosas[3]."]<br/>";

echo "<hr>";

foreach ($aColores as $clave=>$valor)
   		{
   		echo "El valor de  $clave  es:   $valor <br>";
   		}
	
echo "<hr>";

$equipo = array("portero"=>'Cech', "defensa"=>'Terry', "medio"=>'Lampard', "delantero"=>'Torres');

foreach($equipo as $key=>$value)
               {
               echo "El " . $key . " es " . $value . "<br>";
               }
echo "<hr>";

foreach ($equipo as $val) { 
    print $val ."<br>"; 
} 
?>