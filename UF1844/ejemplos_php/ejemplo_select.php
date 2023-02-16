<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $select = array(
        "Madrid"        => "España",
        "Paris"         => "Francia",
        "Londres"       => "Inglaterra",
        "Washingtown"   => "EEUU",
        "Roma"          => "Italia"
    );



    function genera_select($opciones){
        echo "<select id=''>";
        foreach($opciones as $key=>$value){
            echo "<option value='".$key."'>".$value."</option>";
        }

        echo "</select>";
    }

    

    genera_select($select);


    ?>
    
    <select>


    </select>
</body>
</html>