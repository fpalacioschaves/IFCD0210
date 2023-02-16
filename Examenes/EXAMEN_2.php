<?php

$personas=[ 
    ["nombre"=>"Tammy","appellidos"=>"Cuff","email"=>"tcuffO@senate.gov"],
    ["nombre"=>"Dacy","appellidos"=>"Ikringill","email"=>"dikringll1@foxnews.com"],
    ["nombre"=>"Malchy","appellidos"=>"MacMoyer","email"=>"mmacmoyer@mac.com"],
    ["nombre"=>"Atie","appellidos"=>"Ferrick","email"=>"aferrick3@clickbank.net"],
    ["nombre"=>"Jody","appellidos"=>"Herculson","email"=>"jherculson4@paypal.com"],
];

foreach ($personas as $clave => $persona){
    echo "<h3>Persona" . $clave . "</h3>";
    foreach ($persona as $key => $valor){
        //echo $key . "<br>";
        //secho $valor . "<br>";
        echo "<ul>
                <li>" . $key . ' : ' . $valor . ' ' ."</li>
            </ul>"; 
   
    }   
}   


?> 
