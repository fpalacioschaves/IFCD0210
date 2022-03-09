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
        if($_POST){
            $nombre_usuario = $_POST["username"];
            $password = $_POST["password"];
            $edad = intval($_POST["age"]);

            if($nombre_usuario == ""){
                echo "Ojo, el nombre de usuario no puede ser vacio<br>";
            }

            if($password == ""){
                echo "Ojo, el password de usuario no puede ser vacio<br>";
            }

            if($edad >100 || $edad < 18){
                echo "Ojo, la edad tiene que estar entre 18 y 100 años<br>";
            }


        }
        if(!$_POST){
            ?>

            <form id="mi_formulario" action="" method="POST">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" id="username" name="username">

                    <label for="password">Password de usuario</label>
                    <input type="password" id="password" name="password">

                    <label for="edad">Edad</label>
                    <input type="text" id="age" name="age">

                    <input type="submit" value="Enviar">
            </form>
            <?php
        }
           

        ?>


</body>
</html>