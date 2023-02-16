<?php

use Inmueble as GlobalInmueble;

class Inmueble{
    public $metros_cuadrados;
    public $precio_unitario;

    public function __construct($metros_cuadrados, $precio_unitario){
        $this->metros_cuadrados = $metros_cuadrados;
        $this->precio_unitario = $precio_unitario;
    }

    public function calcular_precio(){
        return $this->metros_cuadrados * $this->precio_unitario;
    }

}
 $mi_pisito = new Inmueble(35, 3000);

echo "El valor de mi inmueble es " .  $mi_pisito->calcular_precio();

?>
