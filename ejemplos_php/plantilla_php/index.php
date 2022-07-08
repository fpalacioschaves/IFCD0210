<!-- Funciones usadas en php -->
<?php include("funciones.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/estilos.css">

</head>

<body class="container">
    <!-- Header -->
    <?php
    include("header.php");
    ?>
    <!-- Fin de Header -->

    <main class="row">
        <!-- Parte central-->
        <?php include("main_home.php");?>
        <!--Fin de la parte central-->


        <!-- Parte lateral-->
        <?php include("aside.php");?>
        <!-- Fin de la parte lateral-->

    </main>

    <!-- Inicio del pie -->
    <?php include("footer.php");?>
    <!-- Fin del pie -->
</body>

</html>