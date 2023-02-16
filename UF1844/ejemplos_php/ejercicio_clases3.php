<?php

class Menu{
    private $items;
    public $orientacion;

    public function __construct($items, $orientacion){
        $this->items = $items;
        $this->orientacion = $orientacion;
    }

    public function pinta_menu(){
        if($this->orientacion == "horizontal"){
            foreach ($this->items as $item){
                echo ' <a href="">'.$item.'</a> ';
            }
        }
        else{
            echo "<ul>";
            foreach ($this->items as $item){
                echo "<li><a href=''>".$item."</a></li>";
            } 
            echo "</ul>";  
        }
    }
}
$items = array("Home", "Servicios", "Quienes somos", "Contacto");

$mi_menu = new Menu($items, "vertical");

$mi_menu->orientacion = "horizontal";

$mi_menu->pinta_menu();
?>

