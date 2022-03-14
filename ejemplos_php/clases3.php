<?php 
class Empleado {
    private $nombre;
    public $apellidos;
    public $edad;
    public $puesto;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }
    
    public function setPuesto($puesto){
        $this->puesto= $puesto;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getPuesto(){
        return $this->puesto;
    }

    public function getSueldo(){
        switch ($this->puesto){
            case "administrativo":
                return 1200;
                break;
            case "programador":
                return 1800;
                break;
            case "directivo":
                return 3000;
                break;
            default:
                return 0;
                break;
        
        }

    }

    public function dame_info(){
        echo "El empleado " .$this->nombre . 
        " " . $this->apellidos . " tiene " .
        $this->edad . " años y ocupa el puesto de ".
        $this->puesto . " cobrando " . 
        $this->getSueldo() . " euros";
    }

}

$empleado = new Empleado();

$empleado->setNombre("Francisco");
$empleado->setApellidos("Palacios");
$empleado->setEdad(53);
$empleado->setPuesto("directivo");

$empleado->dame_info();