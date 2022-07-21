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
    $numero_oculto = rand(1,10);
    echo $numero_oculto;
?>

<form action="" method="POST">
    <label for="numero">Cuál es el número que he pensado?</label>
    <input type="number" min=1 max=10>
    <input type="submit" value="Enviar">
</form>
    
</body>
</html>