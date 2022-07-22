<form id="conversor" action="" method="POST">
    Importe:
    <input type="number" name="cantidad"> <br>

    Seleccione la moneda:
   <!-- <select name="moneda">
        <option value="yenes">Yenes</option>
        <option value="dolares">Dólares</option>
        <option value="libras">Libras</option>
    </select>-->

    <!-- Manera 3 -->
    <select name="moneda">
        <option value=140.48>Yenes</option>
        <option value=1.02>Dólares</option>
        <option value=0.82>Libras</option>
    </select>
    <br>

    <input type="submit" value="Convertir">

</form>

<?php
if ($_POST) {
    // Manera 1
    $cantidad = $_POST["cantidad"];
    $moneda = $_POST["moneda"];

    /*if ($moneda == "yenes") {
        echo $cantidad * 140.48;
    }

    if ($moneda == "dolares") {
        echo $cantidad * 1.02;
    }
    if ($moneda == "libras") {
        echo $cantidad * 0.82;
    }*/


    // Manera 2
    /*switch ($moneda) {
        case "yenes":
            echo $cantidad * 140.48;
            break;
        case "dolares":
            echo $cantidad * 1.02;
            break;

        case "libras":
            echo $cantidad * 0.82;
            break;
    }*/

    // Manera 3

    echo $cantidad * $moneda;
}
?>