<?php

if($_POST){

   
    $nombre_y_apellidos = $_POST["nombre_y_apellidos"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    $patatas = intval($_POST["patatas"]);
    $cebollas = intval($_POST["cebollas"]);
    $pimientos = intval($_POST["pimientos"]);
    $huevos = intval($_POST["huevos"]);
    $manzanas = intval($_POST["manzanas"]);
?>
<table width=50% border=1 cellpadding=10 cellspacing=0>
    <tr>
        <td >Nombre y apellidos:</td>
        <td colspan=3><?php echo $nombre_y_apellidos;?></td>
    </tr>
    <tr>
        <td>Dirección:</td>
        <td><?php echo $direccion;?></td>
       
        <td>Teléfono:</td>
        <td><?php echo $telefono;?></td>
    </tr>
    </tr>
    <tr>
        <td colspan=4>Pedido</td>
    </tr>
    <?php if($_POST["patatas"]){   ?>
    <tr>
        <td><?php echo $patatas;?></td>
        <td>Patatas</td>
        <td>1.50 €/kg</td>
        <td><?php echo ($patatas*1.50) . "€";?></td>
    </tr>
    <?php } ?>
    <?php if($_POST["cebollas"]){   ?>
    <tr>
        <td><?php echo $cebollas;?></td>
        <td>Cebollas</td>
        <td>2.50 €/kg</td>
        <td><?php echo ($cebollas*2.50) . "€";?></td>
    </tr>
    <?php } ?>
    <?php if($_POST["pimientos"]){   ?>
    <tr>
        <td><?php echo $pimientos;?></td>
        <td>Pimientos</td>
        <td>3.50 €/kg</td>
        <td><?php echo ($pimientos*3.50) . "€";?></td>
    </tr>
    <?php } ?>
    <?php if($_POST["huevos"]){   ?>
    <tr>
        <td><?php echo $huevos;?></td>
        <td>Huevos</td>
        <td>1.75 €/kg</td>
        <td><?php echo ($huevos*1.75) . "€";?></td>
    </tr>
    <?php } ?>
    <?php if($_POST["manzanas"]){   ?>
    <tr>
        <td><?php echo $manzanas;?></td>
        <td>Manzanas</td>
        <td>4.75 €/kg</td>
        <td><?php echo ($manzanas*4.50) . "€";?></td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan=3>Total:</td>
        <td><?php echo ($patatas*1.50) + ($cebollas*2.50) + ($pimientos*3.50) + ($huevos*1.75) + ($manzanas*4.50) . "€";?>
    </tr>



</table>

<?php
}
?>
