<?php
class Persona {
  public $nombre;
  public $edad;
  public function cargarDatosPersonales($nom,$ed)
  {
    $this->nombre=$nom;
    $this->edad=$ed;
  }
  public function imprimirDatosPersonales()
  {
    
    echo 'Nombre:'.$this->nombre.'<br>';
    echo 'Edad:'.$this->edad.'<br>';
  }
}

class Empleado extends Persona{
  public $sueldo;
  public function cargarSueldo($sueldo)
  {
    $this->sueldo=$sueldo;
  }
  public function imprimirSueldo()
  {
    echo 'Sueldo:'.$this->sueldo.'<br>';
  }
}

$persona1=new Persona();
$persona1->cargarDatosPersonales('Rodriguez Pablo',24);
echo 'Datos personales de la persona:<br>';
$persona1->imprimirDatosPersonales();





$empleado1=New Empleado();
$empleado1->cargarDatosPersonales('Gonzalez Ana',32);
$empleado1->cargarSueldo(2400);
echo 'Datos personales y sueldo del empleado:<br>';
$empleado1->imprimirDatosPersonales();
$empleado1->imprimirSueldo();

?>