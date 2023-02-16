<?php
class Usuario { 
    // Nombre publico, apellido vacío y fecha de nacimiento sin establecer 
    public $nombre = "Angelina"; 
    public $apellido = ""; 
    public $fechaNacimiento; 
    // Direccion protected 
    protected $direccion = "Calle Hispanidad"; 
    // Pais private 
    private $pais = "Mexico"; 
    // Funcion closure 
    public $funcion; 
    // Constructor 
    public function __construct(){ 
        $this->funcion = function(){ 
        return "Hey!"; 
    }; 
    } 
    } 
$usuario = new Usuario; 
var_dump(json_encode($usuario)); 
?>