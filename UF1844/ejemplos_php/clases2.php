<?php
class Perro {
    public $raza;
    public $edad;

    public function setRaza($raza){
        $this->raza = $raza;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function getRaza(){
        return $this->raza;
    }
    
    public function getEdad(){
        return $this->edad;
    }

    public function queComo(){
        if($this->edad <=2){
            echo "Yo aún tomo biberón";
        }
        else{
            echo "Yo ya tomo pienso";
        }
    }
}

// Crear un objeto de la raza Galgo con 5 años

$galgo = new Perro();
$galgo->setRaza("galgo");
$galgo->setEdad(5);

$galgo->queComo();

echo "<pre>";
var_dump($galgo);
echo "</pre>";