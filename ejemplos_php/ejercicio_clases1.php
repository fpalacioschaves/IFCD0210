<?php
class Persona {
    private $nombre;
    private $edad;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }
}

$persona = new Persona();
//$persona->nombre = "José";
$persona->setNombre("José");
//$persona->edad(34);
$persona->setEdad(34);
var_dump($persona);
?>