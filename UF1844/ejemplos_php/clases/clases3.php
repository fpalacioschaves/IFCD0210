<?php
class Trabajador{
    private $nombre_apellidos;
    private $dni;
    private $sueldo;

    // Modo 2 de acceder a los atributos
    public function __construct($nombre_apellidos, $dni = "333333333T", $sueldo = 15000){
        $this->nombre_apellidos = $nombre_apellidos;
        $this->sueldo = $sueldo;
        $this->dni = $dni;
    }
  

    // Modo 1 de acceder a los atributos
    public function setNombre($nombre_apellidos){
        $this->nombre_apellidos = $nombre_apellidos;
    }

    public function setSueldo($sueldo){
        $this->sueldo = $sueldo;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }

    public function dameInfo(){
        echo "El trabajador $this->nombre_apellidos tiene el dni nº $this->dni y cobra un sueldo de $this->sueldo euros.";

    }

    public function comentar(){
        if($this->sueldo < 15000){
            echo "Vaya mierda de sueldo que tienes";
        }
        else{
            echo "Jo, tio, que envidia";
        }
        
    }

}

// Creamos objeto === Instanciar
$trabajador1 = new Trabajador("Paco Palacios");
$trabajador1->setSueldo(245000);
$trabajador1->dameInfo();
$trabajador1->comentar();
?>