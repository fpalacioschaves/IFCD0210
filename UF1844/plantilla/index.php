<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<?php require("funciones.php");?>
<body>

    <!-- Inicio del header -->
    <?php include("header.php"); ?>
    <!-- Fin del header -->
   
    <div class="container">

        <!-- Parte central -->
        <?php include("centro.php");?>
        <!-- Fin de parte central -->
    
        <!-- Aside -->
        <?php include("aside.php");?>
        <!-- Fin del aside -->

    </div>

    <!-- Inicio de footer -->
    <?php include("footer.php");?>
    <!-- Fin del footer -->
</body>
</html>