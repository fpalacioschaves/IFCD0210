<?php
$personas = [["nombre"=>"Tammy", "apellidos" => "Cuff", "email" => "tcuff@senate.gov"],
             ["nombre"=>"Dacy", "apellidos" => "Ikringill", "email" => "dikringill1@foxnews.com"],   
             ["nombre"=>"Malchy", "apellidos" => "MacMoyer", "email" => "mmacmoyer2@mac.com"],
             ["nombre"=>"Artie", "apellidos" => "Ferrick", "email" => "aferrick3@clickbank.net"],
             ["nombre"=>"Jody", "apellidos" => "Herculson", "email" => "jherculson4@paypal.com"]];

echo "<ul>";
    
foreach($personas as $persona){
    
    echo "<li>";

    foreach($persona as $key=>$valor){
        echo "$key: ". "$valor ";
    }

    echo "<li>";
}
   
echo "</ul>";

?>

