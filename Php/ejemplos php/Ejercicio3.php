<?php

class Alumno {
    protected $nombre;
    protected $apellidos;
    protected $dni;
    protected $curso;


    public function __construct($nombre, $apellidos, $dni, $curso = "") {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->curso = $curso;
    }
    
    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getnombre() {
        return $this->nombre;
    }

    public function setapellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getapellidos() {
        return $this->apellidos;
    }

    public function setdni($dni) {
        $this->dni = $dni;
    }

    public function getdni() {
        return $this->dni;
    }

    public function setcurso($curso) {
        $this->curso = $curso;
    }

    public function getcurso() {
        return $this->curso;
    }

    public function infoAlumno() {
       return "Nombre: " .$this->nombre. "<br> Apellidos: ".$this->apellidos."<br> DNI: ". $this->dni;
    }

    public function bajaAlumno($curso){
        if (empty($curso)) 
        {
            echo "<br> El alumno ha sido dado de baja" . $curso;
        }
        else{
            echo "<br> El alumno se encuentra ingresado: ". $curso;
        }
     
    unset($curso);
     
    }
}



$Alumno1 = new Alumno("Mari", "Cordoba", 32423424);
echo $Alumno1->infoAlumno();
echo $Alumno1->bajaAlumno("Desarrollo web");
echo "<br>";
echo "<br>";
$Alumno2 = new Alumno("Perico", "Palotes", 3223525);
echo $Alumno2->infoAlumno();
echo $Alumno1->bajaAlumno("");

?>
