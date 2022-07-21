<?php
   // Siempre que utilicemos sesiones deberemos iniciar con session_start.
   session_start();
    $_SESSION['usuario'] = "Manolo";
    $_SESSION['email'] = "manolo@manolo.com";
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