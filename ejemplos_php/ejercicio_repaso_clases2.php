<?php
class Producto{
    public $nombre;
    public $precio;

    public function __construct($nombre, $precio = 0)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function resumen(){
        echo "Artículo: $this->nombre || Precio: ".$this->pvp()."<br>";
    }

    public function pvp(){
        return $this->precio * 1.21;
    }
}

class Cd extends Producto{
    public $longitud;

   
 
    public function resumen(){
        //echo "Artículo: $this->nombre || Precio: ".$this->pvp()."<br>";
        parent::resumen();
        echo "Duración: $this->longitud minutos<br>";
    }
}

class Libro extends Producto{
    public $paginas;

    public function __construct($nombre, $precio, $paginas){
        parent::__construct($nombre, $precio);
        $this->paginas = $paginas;
    }

    public function resumen(){
        parent::resumen();
        echo "Páginas: $this->paginas<br>";
    }
}

class LibroAntiguo extends Libro{
    public $anyo;

    public function __construct($nombre, $precio, $paginas, $anyo){
        parent::__construct($nombre, $precio, $paginas);
        $this->anyo = $anyo;
    }

    public function resumen(){
        parent::resumen();
        echo "Año de la primera edición: $this->anyo<br>";
    }

    public function __toString()
    {
        return "Artículo: $this->nombre || Precio: ".$this->pvp()."<br>".
        "Año de la primera edición: $this->anyo<br>";
    
    }
}
/*
$producto1 = new Producto("Bolígrafo");
$producto1->resumen();
$producto1->precio = 500;
$producto1->resumen();


$producto2 = new Producto("Pluma", 1200);
$producto2->resumen();


$cd1 = new Cd("Grandes éxitos de Maluma sin Autotune", 400, 5);
$cd1->longitud = 5;
$cd1->resumen();
*/

//$libro = new Libro("Un Mundo Feliz", 30, 350);
//$libro->resumen();

$libro_antiguo = new LibroAntiguo("El Quijote", 100, 1300,1605 );
//$libro_antiguo->resumen();
echo $libro_antiguo;

?>