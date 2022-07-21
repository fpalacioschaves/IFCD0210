<?php 

class Animal{
    public $numero_patas;
    public $familia;

    public function set_patas($numero_patas){
        $this->numero_patas = $numero_patas;
    }
    public function set_familia($familia){
        $this->familia = $familia;
    }
}

class Mamifero extends Animal{
    public $nombre;
    public $numero_cuernos;

    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }

    public function set_cuernos($numero_cuernos){
        $this->numero_cuernos = $numero_cuernos;
    }
}

$cucaracha = new Animal();
$cucaracha->set_patas(8);
$cucaracha->set_familia("bichos");

var_dump($cucaracha);
echo "<br>";
$elefante = new Mamifero();
$elefante->set_nombre("Elefante");
$elefante->set_cuernos(2);
$elefante->set_familia("Bichos gordos mamíferos");

$elefante->set_patas(4);
var_dump($elefante);