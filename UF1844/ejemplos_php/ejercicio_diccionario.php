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
if ($_POST) {
    $frase = $_POST["frase"];

    // Paso 1: todo a minúsculas
    $frase = strtolower($frase);

    // Paso 2: Descomponer la frase en palabras
    $palabras = explode(" ", $frase);

    var_dump($palabras);

    // Paso 3: Coger cada palabra y buscarla en el diccionario
    foreach($palabras as $palabra){

        foreach($diccionario as $espanol => $ingles){

            // Paso 4: Si la encuentro, cambiarla
            if($palabra == $espanol){

                $frase = str_replace($espanol,$ingles,$frase);

            }
        }
    }
}

echo $_POST["frase"] . " - " . $frase;

?>