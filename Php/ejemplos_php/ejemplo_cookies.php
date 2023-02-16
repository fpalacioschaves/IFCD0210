<?php
   if($_POST)
    {
     setcookie(
        "usuario", 
        $_POST['nombreForm'], 
        time()+3600, "/", 
        $_POST['dominioForm']);
    }
 ?>
  <html>
  <head>
    <title>Ejemplo de cookie en PHP 7</title>
 </head> 
  <body>
    <?php
   if($_COOKIE)
    {
     echo "Hay Cookies!: <br>";
      //print_r($_COOKIE);
      echo $_COOKIE["usuario"];
    }
   else
    {
     echo "No hay Cookies :( <br>";
    }
 ?>
  <p>
         <strong>¡Hola!, vamos a grabarte en cookie:</strong>
    </p>
      <form action="" method="post">
         Nombre: <input type="text" name="nombreForm"> <br> <br>
         Dominio: <input type="text" name="dominioForm"> <br> <br>
         <input type="submit" value="Guardar Cookie">
      </form>
  </body> 
  </html>