<?php 
class Cabecera{
    public $titulo;
    public $bgcolor;
    public $orientacion;

    public function pinta(){
        echo 
        '<h1 
        style="background-color:'.$this->bgcolor.' ; 
        text-align:'.$this->orientacion.' ;">'.
        $this->titulo.
        '</h1>';
    }
}

$cabecera = new Cabecera();
$cabecera->titulo = "HOLA A TODOS";
$cabecera->bgcolor = "blue";
$cabecera->orientacion = "center";
$cabecera->pinta();

$cabecera2 = new Cabecera();
$cabecera2->titulo = "OTRA NUEVA CABECERA";
$cabecera2->bgcolor = "red";
$cabecera2->orientacion = "right";

$cabecera2->pinta();