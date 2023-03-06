<?php

class Propiedad{
    public $metros_cuadrados;
    public $direccion;

    public function __construct($metros_cuadrados, $direccion)
    {
        $this->metros_cuadrados = $metros_cuadrados;
        $this->direccion = $direccion;
    }

    public function info(){
        echo "La propiedad tiene " . $this->metros_cuadrados . " metros cuadrados y está situada en " . $this->direccion . "<br>";
    }
}

$propiedad = new Propiedad(120,"Calle Larios, 25");

$propiedad->info();

class Inmueble extends Propiedad{
    private $tipo;
    private $n_habitaciones;
    private $n_banios;
    public $terraza;

    public function __construct($metros_cuadrados, $direccion, $tipo, $n_habitaciones, $n_banios, $terraza = true)
    {
        parent::__construct($metros_cuadrados, $direccion);
        $this->tipo = $tipo;
        $this->n_habitaciones = $n_habitaciones;
        $this->n_banios = $n_banios;
        $this->terraza = $terraza;        
    }

    public function info(){
        parent::info();
        echo "<br>";
        echo "Es un " . $this->tipo . " con " . $this->n_habitaciones .  " habitaciones y " . $this->n_banios . " baños. ";
        if($this->terraza == true){
            echo "Además tiene terraza";
        }
        else{
            echo "No tiene terraza";
        }
    }
}

$inmueble = new Inmueble(150, "Alameda de Colón, 33", "ático", 5, 2);


$inmueble->info();

?>