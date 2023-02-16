<form id="mi_formulario" action="" method="POST">
    <h2>Pintaremos una tabla</h2><br><br>
    <label for="filas"><b>Escriba el número de filas que desea</b></label> <br>
        <input type="number" name="filas" required><br><br>
    <label for="columnas"><b>Escriba el número de columnas que desea</b></label> <br>
        <input type="number" name="columnas" required><br><br>
    <input type="submit" value="Enviar">
</form>


<?php
if($_POST){

$filas = $_POST['filas'];
    if (isset($_POST["filas"])) {
        $filas = $_POST['filas'];
    }

$columnas = $_POST['columnas'];
if (isset($_POST["columnas"])) {
    $columnas = $_POST['columnas'];
}


function creartabla($filas, $columnas){
    echo "<table border=1 ";
    
    for($i=1; $i <= $filas; $i++){
        
        echo "<tr>
                <td>Esta es la fila" . $i . "</td>";

            for($i=1; $i <= $columnas; $i++){
    
                echo "<td>Esta es la columna " . $i . "</td>";  
            }    
        echo "</tr>";  
    }
    echo "</table>";

}

creartabla($filas, $columnas);
}

?>


