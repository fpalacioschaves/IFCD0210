<?php 

class Cabecera{
    public $texto;
    public $color_fondo;
    public $alineacion;

    public function pintar(){
        echo "<div style='background-color: $this->color_fondo;
        text-align:$this->alineacion;'>
        <h1>$this->texto</h1>
        </div>";
    } 
}

$mi_cabecera = new Cabecera;
$mi_cabecera->texto = "HOLA CARACOLA";
$mi_cabecera->color_fondo =  "#ccc";
$mi_cabecera->alineacion = "center";
$mi_cabecera->pintar();
?>