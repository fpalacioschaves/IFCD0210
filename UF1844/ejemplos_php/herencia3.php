<?php
class Producto {  
   protected $id;  
   private $titulo;  
   private $precio;  
   private $nombreAutor;  
   private $apellidosAutor;  
   function __construct($id, $titulo, $precio, $nombreAutor, $apellidosAutor) {  
     $this->id = $id;  
     $this->titulo = $titulo;  
     $this->nombreAutor = $nombreAutor;  
     $this->apellidosAutor = $apellidosAutor;  
     $this->precio = $precio;  
   }  
   public function getId(){  
     return $this->id;  
   }  
   public function getAutor() {  
     return $this->nombreAutor . " " . $this->apellidosAutor;  
   }  
   public function getTitulo() {  
     return $this->titulo;  
   }  
   public function getPrecio() {  
     return $this->precio;  
   }  
   protected function getResumen() {  
     $resumen = "Titulo: " . $this->getTitulo() . ", Precio: " . $this->getPrecio();  
     $resumen .= ", Autor: " . $this->getAutor();  
     return $resumen;  
   }  
 
 }  

 class Libro extends Producto {  
    private $numPaginas;  
    function __construct($id, $titulo, $precio, $nombreAutor, $apellidosAutor, $numPaginas) {  
      parent::__construct($id, $titulo, $precio, $nombreAutor, $apellidosAutor);  
      $this->numPaginas = $numPaginas;  
    }  
    public function getNumPaginas() {  
      return $this->numPaginas;  
    }  
 
    public function getResumen() {  
      $resumen = parent::getResumen();  
      $resumen .= ", Núm. páginas: " . $this->getNumPaginas();  
      return $resumen;  
    }  
  }  

  $producto = new Producto(1, "titulo del producto", 200, "Francisco", "Palacios");
  //echo $producto->getResumen();

  $libro = new Libro(3,"Mi Libro",300, "Antonio", "Gómez", 120);

  echo $libro->getResumen();

  ?>