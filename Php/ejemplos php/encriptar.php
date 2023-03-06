<form id="encript" action="" method="POST">
Clave: <input type="text" name="key" id="key">
Mensaje: <input type="text" name="message" id="messsage">
<input type="submit" value="encriptar">
</form>
<?php
if($_POST){
$key = $_POST["key"];
$message = strtolower($_POST["message"]);
$abecedario = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z"];
$c_message = "";
for($i=0; $i<strlen($message); $i++){
    $caracter = $message[$i];
    $posicion = array_search($caracter, $abecedario); 
    $nueva_posicion = $posicion + $key;

    if($nueva_posicion >= 27){
        $nueva_posicion = $nueva_posicion - 27;

    }
    $c_message = $c_message . $abecedario[$nueva_posicion];
}
echo "Mensaje original: " . $message . " Mensaje codificado: ". $c_message;

}
else{

} ?> 