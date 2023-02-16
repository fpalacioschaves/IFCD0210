<?php
class Alumno{
    private $nombre;
    private $edad;
    private $curso;

    public function __construct($nombre = "Nombre", $edad = 100, $curso = "Curso"){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->curso = $curso;
    }

    public function dame_info(){
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Curso: " . $this->curso . "<br>";
    }
}

$alumno = new Alumno("Antonio Gutierrez", 34, "Certificado de Profesionalidad Aplicaciones Web");

$alumno2 = new Alumno("Angustias");

var_dump($alumno2);

$alumno3 = new Alumno("Antonio", 56);

var_dump($alumno3);

$alumno4 = new Alumno();

var_dump($alumno4);

?>