<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="mi_formulario" action="" method="POST">
        <input type="text" name="edad"  id="username">
        <input type="text" name="edad" id="edad">
        <input type="password" name="pass" id="password">
        <input type="submit" value="Enviar">
</form>
<?php 
if($_POST){
    print_r($_POST);
    //echo "El valor del nombre es " . $_POST["user"];
    //echo "El valor de la edad es " . $_POST["edad"];
}
?>
</body>
</html>