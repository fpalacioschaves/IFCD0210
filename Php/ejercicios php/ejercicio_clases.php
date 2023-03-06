<?php
class Empleado {
    public $nombre;
    public $sueldo;

    public function __construct($nombre, $sueldo){
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function dame_info(){
        echo "Nombre: " . $this->nombre;
        echo "<br>";
        echo "Sueldo: " . $this->sueldo;
        echo "<br>";
        if( $this->sueldo > 20000){
            echo "Debe pagar impuestos";
        }
        else{
            echo "Está libre de impuestos";
        }
    }
}

$mi_empleado = new Empleado("Antonio Pérez", 34000);

$mi_empleado->dame_info();

echo "<br>";

$mi_empleado2 = new Empleado("Luis Sánchez", 15000);

$mi_empleado2->dame_info();
?>