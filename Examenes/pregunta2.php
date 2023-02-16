<div>
<br>
<a href="index.php">Volver a inicio</a>
<br>
</div>
<?php 
$personas=[
["nombre"=>"Tammy", "apellidos"=>"Cuff", "email"=>"tcuff0@senate.gov"],
["nombre"=>"Dacy", "apellidos"=>"Ikringill", "email"=>"dikringill1@foxnews.com"],
["nombre"=>"Malchy", "apellidos"=>"McMoyer", "email"=>"mmacmoyer2@mac.com"],
["nombre"=>"Artie", "apellidos"=>"Ferryck", "email"=>"aferrick3@clickbank.net"],
["nombre"=>"Jody", "apellidos"=>"Herculson", "email"=>"jherculson4@paypal.com"],
];

?>
<style>
    table tr td {
        padding : 10px;
    }
</style>
<!-- formato tabla -->
<h3>estilos tabla y lista</h3>
<table border = 1>
    <theader>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
    </theader>
    <?php
        foreach ($personas as $datos){
            echo '<tr>';
                foreach ($datos as $dato ) {
                    echo '<td>';
                    echo $dato;
                    echo '</td>';
                }
            echo '</tr>';
        }
      
        /* formato lista */
        
       echo '<ol>';
       foreach ($personas as $datos){
        echo '<li>';
            foreach ($datos as $key => $dato ) {
                echo '<ul>';
                echo $key.':'.$dato;
                echo '</ul>';
            }
        echo '</li>';
    }
    echo '</ol>';

    ?>
</table>