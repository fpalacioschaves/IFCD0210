<?php

class Mascota{
    public $nombre;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }
}

class Pez extends Mascota{
    public $especie;
    public $color;

    public function setEspecie($especie){
        $this->especie = $especie;
    }

    public function getEspecie(){
        return $this->especie;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }

    public function dameInfo(){
        echo "Mi pez $this->nombre es de la especie $this->especie y es de color $this->color";
    }
}

$pez1 = new Pez;

$pez1->setNombre("Octopussy");
$pez1->setEspecie("Pulpoide Cefalópodo");
$pez1->setColor("Gris");
$pez1 ->dameInfo();