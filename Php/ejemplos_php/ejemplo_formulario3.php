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
        <label for="username">Nombre de usuario</label>
        <input type="text" id="username" name="username">

        <label for="password">Password de usuario</label>
        <input type="password" id="password" name="password">

        <label for="name">Nombre</label>
        <input type="text" id="name" name="name">

        <label for="lastname">Apellido de usuario</label>
        <input type="text" id="lastname" name="lastname">

        <input type="submit" value="Enviar">

        <?php
        if($_POST){
            $nombre_usuario = $_POST["username"];

            if($nombre_usuario == ""){
                echo "Ojo, el nombre de usuario no puede ser vacio";
            }
        }
           

        ?>





    </form>
</body>
</html>