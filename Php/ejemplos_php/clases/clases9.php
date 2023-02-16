<?php

class Plato{
    public $nombre;
    public $descripcion;
    public $celiaco;
    public $vegano;
    public $precio;

    public function __construct($nombre, $descripcion){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function SetCeliaco($celiaco){
        $this->celiaco = $celiaco;
    }

    public function SetVegano($vegano){
        $this->vegano = $vegano;
    }

    public function SetPrecio($precio){
        $this->precio = $precio;
    }

    public function damePlato(){
        echo "<h1>$this->nombre</h1>";
        echo "<p><b>$this->descripcion</b></p>";
        if($this->celiaco){
            echo "<p>Apto para celíacos</p>";
        }
        else{
            echo "<p><b>Ojo: no apto para celíacos</b></p>";
        }
        if($this->vegano){
            echo "<p>Plato apto para veganos<p>";
        }
        else{
            echo "<p><strong>Ojo: plato no apto para veganos</strong></p>";
        }
        echo "Precio: $this->precio €";
    }
    

}

class Entrante extends Plato{
    public $tipo;

    public function __construct($nombre, $descripcion, $tipo)
    {
        parent::__construct($nombre, $descripcion);
        $this->tipo = $tipo;
    }

    public function damePlato(){
        parent::damePlato();
        if($this->tipo == "tapa"){
            echo "<p>Precio de la tapa: " . $this->precio/3 . " €</p>";
        }
        if($this->tipo == "media"){
            echo "<p>Precio de la media ración: " . $this->precio/2 . " €</p>";
        }
        
    }
}

$plato1 = new Plato("Potaje de lentejas", "Suave y delicado plato para el verano.");

$plato1 ->setCeliaco(true);
$plato1->setVegano(false);
$plato1->setPrecio(6);
$plato1->damePlato();

$entrante = new Entrante("Torreznos", "Cacho carne asquerosa", "tapa");
$entrante->setCeliaco(false);
$entrante->setVegano(false);
$entrante->setPrecio(18);
$entrante->damePlato();