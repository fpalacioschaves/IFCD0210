<?php

class Articulo{
    public $nombre;
    public $precio;

    public function __construct($nombre, $precio){
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function pintaArticulo(){
        echo "<div style='border: 1px solid #ccc;'>
        <h3>Nombre: $this->nombre</h3>
        <h4>Precio: $this->precio</h4>
        </div>";
    }
}

class Articulo_Rebajado extends Articulo{
    public $precio_rebajado;

    public function __construct($nombre, $precio,$precio_rebajado)
    {
        parent::__construct($nombre, $precio);
        $this->precio_rebajado = $precio_rebajado;
    }

    public function pintaArticulo(){
        echo "<div style='border: 1px solid #ccc;' onclick='alert(\"HOLA\");'>
        <h3>Nombre: $this->nombre</h3>
        <h4>Precio: <span style='text-decoration: line-through;'>$this->precio<span></h4>
        <h4>Precio rebajado: $this->precio_rebajado
        </div>";
      
    }
}

$articulo1 = new Articulo("Bicicleta de montaña", 1500);
$articulo1->pintaArticulo();

$articulo_oferta = new Articulo_Rebajado("Bicicleta de montaña", 1500, 1200);
$articulo_oferta->pintaArticulo();
