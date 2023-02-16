<?php

    $personas = [
        ["nombre" => "tammy","apellidos"=>"cuff","email" =>"tcuff0@senate.gov"],
        ["nombre" => "dacy","apellidos"=>"ikringill","email" => "dikringill1@foxnews.com"],
        ["nombre" => "malchy","apellidos"=>"macmoyer","email" => "mmacmoyer2@mac.com"],
        ["nombre" => "artie","apellidos"=>"ferrick","email" => "aferrick3@clickbank.net"],
        ["nombre" => "jody","apellidos"=>"herculson","email" => "¡herculson4@paypal.com"]
        ];

?>
    <?php
    foreach($personas as $persona){
        
        echo "<ul>";
        foreach($persona as $key => $value){
            echo 
            "<li>".  $value ."</li >";
        }
        echo"</ul>";
    }
    ?>