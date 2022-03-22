<?php 

class Cabecera{
    public $titulo;
    public $color;
    public $alineacion;

    public function __construct($titulo, $color = "#000", $alineacion = "center"){
        $this->titulo = $titulo;
        $this->color = $color;
        $this->alineacion = $alineacion;
    }
    
    public function pinta_cabecera(){
        echo "<header>";
            echo "<h1 style='color:$this->color; text-align:$this->alineacion'>$this->titulo</h1>";
        echo "</header>";

        
    }
}

$micabecera = new Cabecera("Euroformac","#000","left");

$micabecera->pinta_cabecera();

?>

