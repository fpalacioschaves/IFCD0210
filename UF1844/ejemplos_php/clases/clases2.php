<?php

class Alumno{

    // atributos del alumno
    private $nombre;
    public $apellido;
    public $curso;
    private $dni;
    public $email;

    public function __construct($nombre){
        $this->nombre = $nombre;
    }
    

    // inserta el nombre del alumno
    public function setNombre($nombre_alumno){
        $this->nombre = $nombre_alumno;
    }

    // inserta el apellido del alumno
    public function setApellido($apellido_alumno){
        $this->apellido = $apellido_alumno;
    }

    public function setDni($dni_alumno){
        $this->dni = $dni_alumno;
    }

    public function dameInfo(){
        echo "El alumno se llama " . $this->nombre . " " . $this->apellido;
        echo "El alumno tiene el dni " . $this->dni;
        echo "El alumno tiene de edad " .  $this->edad; 
    }


}

$alumno = new Alumno("Paco");
$alumno->Setnombre("Manolo");
$alumno->edad = 45;
//$alumno->dni = "33354827C";
$alumno->setDni("33354827C");

$alumno->dameInfo();
//$alumno->nombre = "Antonio";

//$alumno->setNombre("Antonio");