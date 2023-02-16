<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            border: solid black 1px;
        }
    </style>
</head>
<body>
    <?php

    $personas = [
        ["nombre" => "Idelle","apellidos" => "Cuff","email"=> "ipauletto6@intel.com"],
        ["nombre" => "Eward","apellidos" => "MacMoyer","email"=> "ebramhall7@geocities.com"],
        ["nombre" => "Janet","apellidos" =>"Ferrick","email"=> "jtoolan8@simplemachines.org"],
        ["nombre" => "Glenna","apellidos" => "Herculson","email"=> "gtrimbey9@webeden.com"]
    ];
    
    echo "<ul>";
    foreach ($personas as $key => $value) {
        echo "<li>Persona ".($key+1)."<ul>";
        foreach ($value as $key2 => $value2) {
            echo "<li>".$key2.": ".$value2."</li>";
        }
        echo "</ul></li>";
    }
    echo "</ul>";

    ?>
</body>
</html>