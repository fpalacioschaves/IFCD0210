<?php
Interface Acciones{
    public function moverse();

    public function comer();
}

class Gato implements Acciones{
    public function moverse(){
        echo "el gato se mueve sigilosamente";
    }

    public function comer(){
        echo "el gato come ratones";
    }
}

class Boa implements Acciones{
    public function moverse(){
        echo "La boa repta";
    }
    public function comer(){
        echo "La boa come ratones pero sin masticar";
    }
}

$gato = new Gato;
$gato->comer();

$boa = new Boa;
$boa->comer();
