<?php


/* 
Crear una clase Factura que tenga
los atributos IVA, Base, fecha, impuestos
Importe Bruto, Estado (pagada o no pagada)

Crear un constructor con IVA, Base, fecha

Crear setters para los atributos (todos)

Crear una función que imprima en pantalla toda la info de la Factura */

class Factura{
    public $iva;
    public $base;
    public $fecha;
    public $impuestos;
    public $importe_bruto;
    public $estado;

    public function __construct($iva, $base, $fecha){
        $this->iva = $iva;
        $this->base = $base;
        $this->fecha = $fecha;
    }
    
    public function setEstado($estado){
        $this->estado = $estado;
    }


    /* ... */

    public function mostrarInfo(){
        $neto = $this->base * $this->iva;
        echo "<p>Factura</p>";
        echo "<p>Fecha: $this->fecha</p>";
        echo "<p>Importe Base: $this->base €</p>";
        echo "Impuestos: " . $neto . " €</p>";
        echo "Total: " . ($this->base + $neto) . " €</p>";
        echo "<p>Estado de la factura: $this->estado</p>";
    } 

}

$factura = new Factura(0.21,1000,"19/7/2022");
$factura->setEstado("Pendiente de pago");
$factura->mostrarInfo();