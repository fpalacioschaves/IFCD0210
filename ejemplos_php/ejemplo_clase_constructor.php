<?php
class Perro {
    public $raza;
    public $edad;
    public $color_pelo;

    public function __construct($raza, $edad){
        $this->raza = $raza;
        $this->edad = $edad;
    }
    

}

$miperro = new Perro("galgo", 3);
$miperro->edad = 23;
$miperro->color_pelo = "marrón con pintas";

var_dump($miperro);
?>