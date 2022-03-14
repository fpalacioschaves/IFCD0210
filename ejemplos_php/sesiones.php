<?php
   // Siempre que utilicemos sesiones deberemos iniciar con session_start.
   session_start();
    $_SESSION['variable_de_sesion_1'] = "Algún valor definido";
    $_SESSION['variable_de_sesion_2'] = "Algún otro valor definido";
  ?>
  <html>
  <head> 
   <title>Ejemplo de variable reservada en PHP 7</title> 
  </head> 
  <body>
  <pre>
 <?php
   print_r($_SESSION);
 ?>
  </pre >

  <a href="sesiones2.php">Ir a otra página</a>
 </body> 
  </html>