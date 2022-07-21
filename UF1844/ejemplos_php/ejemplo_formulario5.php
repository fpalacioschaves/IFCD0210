<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="POST">
<label>Número 1</label>
<input type="number" name="numero1">

<label>Número 2</label>
<input type="number" name="numero2">

<input type="submit" value="Enviar">
</form>

<?php
    if($_POST){
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];

        echo "La suma es " . $numero1 + $numero2;
    }


?>
</body>
</html>