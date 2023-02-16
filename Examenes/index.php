<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJERCICIO 002</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<table>
    <tr class="inicial">
        <td>NOMBRE</td>
        <td>EMAIL</td>
        <td>TELEFONO</td>
    </tr>    

    <?php

$personas = 
[
   
   ["nombre"=>"Tammy", "apellidos"=>"Cuff", "email"=>"tcuffO@senate.gov"],
   ["nombre"=>"Dacy", "apellidos"=>"Ikringill", "email"=>"dikringill1a@foxnews.com"],
   ["nombre"=>"Malchy", "apellidos"=>"MacMoyer", "email"=>"mmacmoyer2@mac.com"],
   ["nombre"=>"Artie", "apellidos"=>"Ferrick", "email"=>"aferrick3@clickbank.net"],
   ["nombre"=>"Jody", "apellidos"=>"Herculson", "email"=>"jherculson4@paypal.com"]
   
    
];


foreach ($personas as $array_numerico)
{
    echo "<tr>";
    foreach ($array_numerico as $valores_internos)
    {
        echo "<td>$valores_internos</td>";
    }
    echo "</tr>";
}

?>
    
</table>
</body>
</html>