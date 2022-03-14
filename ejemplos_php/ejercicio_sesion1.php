<?php session_start();?>
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
    if($_SESSION){
        echo "Usuario: " . $_SESSION["usuario"] . "<br>";
        echo "Password: " . $_SESSION["password"] . "<br>";
    ?>
        <a href="logout.php">Logout</a>
    <?php
    }
    else{
        ?>
        <form id="login" action="login.php" method="POST">
            <label for "user">Usuario</label>
            <input type="text" name="usuario" id="usuario">

            <label for "password">Password</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Login">
        </form>
        <?php

    }

    ?>


</body>
</html>