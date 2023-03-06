<?php
    class Persona{
        public $nombre;

        public function __construct($nombre){
            $this->nombre = $nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }
    }

    $persona1 = new Persona("Juan Antonio");

    //print_r($persona1);

    $persona1->setNombre ("Maricarmen");

    //print_r($persona1);

    $persona2 = new Persona ("Jose Francisco");

    $persona3 = new Persona("Jose el Analógico");

    echo $persona2->getNombre();
    echo "<br>";

    echo $persona1->getNombre();

    echo "<br>";

    echo $persona3->getNombre();
?>