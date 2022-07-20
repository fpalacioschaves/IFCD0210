<?php
class Imagen{
    public $nombre;
    public $ruta;
    public $borde;

    public function __construct($nombre, $ruta, $borde = 0){
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->borde = $borde;
    }

    public function PintaImagen(){

       echo "<img src='$this->ruta/$this->nombre' border=$this->borde />";
    }
}

class ImagenPlus extends Imagen{
    public $ancho;
    public $alto;

    public function __construct($nombre, $ruta, $ancho, $alto, $borde= 0){
        parent::__construct($nombre, $ruta, $borde);
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function PintaImagen(){
        
        echo "<img src='$this->ruta/$this->nombre' width=$this->ancho height=$this->alto border=$this->borde />";

    }
    
}

$imagen = new Imagen("alcachofas.jpg","./img", 3);
$imagen->PintaImagen();

$imagen2 = new ImagenPlus("alcachofas.jpg","./img", 300, 200,5);
$imagen2->PintaImagen();

?>