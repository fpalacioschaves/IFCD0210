<?php

class Cuenta{
    public $titular;
    public $cantidad;

    public function __construct($titular, $cantidad){
        $this->titular = $titular;
        $this->cantidad = $cantidad;
    }

    public function mostrar(){
        echo "Titular: " . $this->titular . "<br>";
        echo "Saldo: " . $this->cantidad . "<br>";
    }

    public function ingresar($ingreso){
        $this->cantidad = $this->cantidad + $ingreso;
    }

    public function retirar($reintegro){
        if($this->cantidad - $reintegro > 0){
            $this->cantidad = $this->cantidad - $reintegro;
        }
    }
}

class Cuenta_Joven extends Cuenta{
    public $edad;
    public $bonificacion;

    public function __construct($titular, $cantidad, $edad, $bonificacion){
        parent::__construct($titular, $cantidad);
        $this->edad = $edad;
        $this->bonificacion = $bonificacion;
    }

    public function mostrar(){
        parent::mostrar();
        echo "Edad: " . $this->edad . "<br>";
        echo "Bonificación: " . $this->bonificacion . "<br>";
    }

}

$nueva_cuenta = new Cuenta("Francisco Palacios", 10000);
$nueva_cuenta->mostrar();

$nueva_cuenta->ingresar(2000);
$nueva_cuenta->mostrar();

$nueva_cuenta->retirar(4000);
$nueva_cuenta->mostrar();

$nueva_cuenta_joven = new Cuenta_Joven("Manolo Pérez", 1000, 25, 0.05);
$nueva_cuenta_joven->mostrar();