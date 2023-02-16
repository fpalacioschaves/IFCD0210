<?php

class alumno{
    private $nombre;
    private $apellidos;
    private $dni;
    private $curso;

    public function __construct($nombre, $apellidos, $dni, $curso){

        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->curso = $curso;
    }
   
    public function getNombre(){ 

        return $this->nombre;

    }
    public function getApellidos(){ 

        return $this->apellidos;

    }
    public function getDni(){ 

        return $this->dni;

    }
    public function getCurso(){ 

        return $this->curso;

    }
    public function setNombre($nombre){ 

        $this->nombre = $nombre;

    }
    public function setApellidos($apellidos){ 

        $this->apellidos = $apellidos;

    }
    public function setDni($dni){ 

        $this->dni = $dni;

    }
    public function setNombre($curso){ 

        $this->curso = $curso;

    }


    public function alta($nombre, $apellidos, $dni, $curso){
       
        echo "Nombre:".$this->nombre."  Apellidos:  ".$this->apellidos."  dni:  ".$this->dni. " <br>";

    }

    public function baja($nombre, $apellidos, $dni, $curso){

        $this->curso = NULL;
        echo "Nombre:".$this->nombre."  Apellidos:  ".$this->apellidos."  dni:  ".$this->dni. " Curso:" .$this->curso." <br>";

    }


    

?>