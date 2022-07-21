<?php
     setcookie("usuario", "yomismo", time()+3600);

     setcookie("password", "root", time()+3600);

     print_r($_COOKIE["usuario"]);

     echo "<br>";

     print_r($_COOKIE["password"]);

?>