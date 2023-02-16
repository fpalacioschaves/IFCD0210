<html> 
 <head>
      <title>Ejemplo de funciones en PHP 7</title>
  </head> 
 <body>
 <?php
  function sumarDatos($dato1,$dato2,$dato3,$item)
 {
   $totalDeDatos = $dato1+$dato2+$dato3;
   echo "El total de datos es: ".$totalDeDatos." para el item: ".$item.".";
  }
 sumarDatos(10,20,1,'Dulces de caramelo');
  ?>
 </body> 
  </html>

​ Usando variables fuera de Función
Cuando tengamos que utilizar una variable que no esté declara dentro de la función tendremos que hacer uso de global.
 <html> 
 <head>
      <title>Ejemplo de funciones en PHP 7</title>
  </head> 
 <body>
 <?php
  // Variable fuera de la función
 $tienda = "Sucursal norte";
 function sumarDatos($dato1,$dato2,$dato3,$item)
 {
   // La hacemos variable global
   global $tienda;
   $totalDeDatos = $dato1+$dato2+$dato3;
   echo "El total de datos es: ".$totalDeDatos." para el item: ".$item." para la tienda: ".$tienda .".";
 
  }
 sumarDatos(10,20,1,'Dulces de caramelo');
  ?>
 </body> 
  </html>