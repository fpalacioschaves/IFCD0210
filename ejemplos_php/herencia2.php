<?php
class Empleado2{
    public $nombre;
    public $dni;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }

    public function dame_info(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "DNI: " . $this->dni . "<br>";
    }
}

class Directivo extends Empleado2{
    public $sueldo;
    public $puesto;

    public function setSueldo($sueldo){
        $this->sueldo = $sueldo;
    }

    public function setPuesto($puesto){
        $this->puesto = $puesto;
    }

    public function dame_info(){
        /*echo "Nombre: " . $this->nombre . "<br>";
        echo "DNI: " . $this->dni . "<br>";*/
        parent::dame_info();
        echo "Puesto: " . $this->puesto . "<br>";
        echo "Sueldo: " . $this->sueldo . "<br>";
    }
}

$mi_empleado = new Empleado2();
$mi_empleado->setNombre("Antonio");
$mi_empleado->setDni("23345678Y");
$mi_empleado->dame_info();

$mi_jefe = new Directivo();
$mi_jefe->setNombre("D. Luis");
$mi_jefe->setDni("33354827C");
$mi_jefe->setPuesto("CEO Managment Oriented Customer Service");
$mi_jefe->setSueldo(200000);

$mi_jefe->dame_info();