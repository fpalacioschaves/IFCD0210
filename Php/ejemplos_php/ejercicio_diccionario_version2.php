<form action="" method="POST">
    Introduce la frase a traducir:
    <input type="text" name="frase">
    <br>
    <input type="submit" value="Traducir">
</form>

<?php
$diccionario = [
    "es" => "is",
    "lunes" => "monday",
    "manzana" => "apple",
    "rojo" => "red",
    "cinco" => "five" 
];

$diccionario = ["lunes", "es", "manzana", "rojo", "cinco"];


if ($_POST) {
    $frase = $_POST["frase"];

    // Paso 1: todo a minúsculas
    $frase = strtolower($frase);

    // Paso 2: Descomponer la frase en palabras
    $palabras = explode(" ", $frase);


    // Paso 3: Coger cada palabra y buscarla en el diccionario
    foreach($palabras as $palabra){

        if(isset($diccionario[$palabra])){

            $frase = str_replace($palabra, $diccionario[$palabra], $frase);
        }
        
    }

    echo $_POST["frase"] . " - " . $frase;
}



?>