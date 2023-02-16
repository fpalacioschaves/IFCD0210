<?php
$personas = [
    ["nombre" => "Tammy", "apellido" => "Cuff", "email" => "tcuff0@senate.gov"],
    ["nombre" => "Dacy",  "apellido" => "Ikringill", "email" => "dikringill1@foxnews.com"],
    ["nombre" => "Malchy", "apellido" => "MacMoyer", "email" => "mmacmoyer2@mac.com"],
    ["nombre" => "Artie", "apellido" => "Ferrick", "email" => "aferrick3@clickbank.net"],
    ["nombre" => "Jody", "apellido" => "Herculson", "email" => "jherculson4@paypal.com"]
];

?>
<table width=80% border=10 celspacing=10 style="margin:50px auto; text-align:center;">
    <tr style="background-color: orange;">
        <td>nombre</td>
        <td>apellido</td>
        <td>email</td>
    </tr>
    <?php
    foreach ($personas as $alumno) {
        echo "<tr>
            <td>" . $alumno["nombre"] . "</td>
            <td>" . $alumno["apellido"] . "</td>
            <td>" . $alumno["email"] . "</td>
            </tr>";
    }

    ?>
</table>