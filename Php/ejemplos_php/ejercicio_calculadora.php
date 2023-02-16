<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

        $resultado = "Resultado : ";
        if($_POST){

           $val1 = $_POST["val1"];
           $val2 = $_POST["val2"];
           if(isset($_POST["suma"])){
               $resultado.=  $val1 . " + " . $val2 . " = " . ($val1+$val2);
           }

           if(isset($_POST["resta"])){
            $resultado.= $val1 . " - " . $val2 . " = " . ($val1-$val2);
        }

        if(isset($_POST["multiplicacion"])){
            $resultado.= $val1 . " * " . $val2 . " = " . ($val1*$val2);
        }

        if(isset($_POST["division"]) && $_POST["val2"] != 0){
            $resultado.= $val1 . " / " . $val2 . " = " . ($val1/$val2);
        }
        if(isset($_POST["reset"])){
            $_POST["val1"] = 0;
            $_POST["val2"] = 0;
        }
        }
    ?>

    <form id="calculadora" action="" method="POST">

        <input type="number" name="val1" id="val1" value="<?php echo ($_POST ? $_POST["val1"] : 0);?>">

        <input type="number" name="val2" id="val2" value="<?php echo($_POST ? $_POST["val2"] : 0);?>">

        <input type="submit" name="suma" id="suma" value="+">

        <input type="submit" name="resta" id="resta" value="-">

        <input type="submit" name="multiplicacion" id="multiplicacion" value="*">

        <input type="submit" name="division" id="division" value="/">

        <input type="submit" name="reset" id="reset" value="Reset">


    </form>

    <div><?php echo $resultado;?></div>
</head>
<body>
    
</body>
</html>