<?php
class Pedido{

    public $barras_de_pan;
    public $croisants;
    public $napolitanas;
    public $lista;

    public function __construct($barras_de_pan,$croisants,$napolitanas){
        $this->barras_de_pan = $barras_de_pan;
        $this->croisants = $croisants;
        $this->napolitanas = $napolitanas;

        
    }
    public function mostrar_total(){
        
        return $this->barras_de_pan + ($this->croisants*1.5) + ($this->napolitanas *2);
    }
       
    }
    

$barras = $_POST["barras"];
$croisants = $_POST["croisants"];
$napolitanas = $_POST["napolitanas"];

// Guardar datos en un array
$mi_pedido = [
    "barras" => ["cantidad" => $barras, "precio" => 1],
    "croisants" => ["cantidad" => $croisants, "precio" => 1.5],
    "napolitanas" => ["cantidad" => $napolitanas, "precio" => 2]
];

$pedido = new Pedido($barras,$croisants,$napolitanas);



?>

<table width="50%" border=1 cellpadding=5 cellspacing=0>
    <thead>
        <td>Cantidad</td>
        <td>Producto</td>
        <td>Subtotal</td>
    </thead>

    <tr>
        <td><?php echo $pedido->barras_de_pan; //$barras?></td>
        <td>Barras de pan</td>
        <td><?php echo $pedido->barras_de_pan;?> €</td>
    </tr>

    <tr>
        <td><?php echo $pedido->croisants;?></td>
        <td>Croisants</td>
        <td><?php echo $pedido->croisants * 1.5;?> €</td>
    </tr>

    <tr>
        <td><?php echo $pedido->napolitanas;?></td>
        <td>Napolitanas</td>
        <td><?php echo $pedido->napolitanas * 2;?> €</td>
    </tr>

    <tr>
        <td colspan=2>Total</td>
        <td><?php echo $pedido->mostrar_total();?> €</td>
    </tr>
</table>

