<?php
$clase = [
    ["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
    ["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
    ["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
    ["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578],
    ["nombre" =>"Francisco López", "email" => "flopez@gmail.com", "telefono" => 655456578]
];

?>

<table width=75% border=1 cellpading=10 celspacing=0 style="margin: 50px auto;">
    <tr>
        <td>Nombre</td>
        <td>Email</td>
        <td>Teléfono</td>
    </tr>
    <?php
    foreach($clase as $alumno){
        echo "<tr>
            <td>".$alumno["nombre"]."</td>
            <td>".$alumno["email"]."</td>
            <td>".$alumno["telefono"]."</td>
        </tr>";
    }
    ?>

</table>
