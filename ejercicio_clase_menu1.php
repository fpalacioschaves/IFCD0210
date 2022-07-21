<style>
    .menu ul {
        list-style: none;
        display: flex;
        width: 50%;
        margin: 50px auto;
        justify-content: space-between;
    }
    .menu li{
        padding: 10px 25px;
        border: 1px solid #333;
        border-radius: 5px;
        font-size: 25px;
    }
    .menu li a{
        text-decoration: none;
        color: #333;
    }
</style>
<?php

class Menu{
    public $menu;

    public function setMenu($menu){
        $this->menu = $menu;
    }

    public function pintaMenu(){
        echo "<ul>";
        foreach($this->menu as $etiqueta=>$valor){
            echo "<li>
                    <a href='$valor'>$etiqueta</a>
                  </li>";
        }
        echo "</ul>";
    }
}

class MenuPlus extends Menu{
    public $estilo;

    public function setEstilo($estilo){
        $this->estilo = $estilo;
    }

    public function pintaMenu()
    {
        
        echo "<div class='$this->estilo'>";
        parent::pintaMenu();    
        echo "</div>";
    }
}

$array_menu = [
    "Inicio"    =>  "index.php",
    "Tienda"    =>  "shop.php",
    "La Empresa" => "quienes_somos.php",
    "Contacto"  =>  "contacto.php"
];
$menu = new Menu;
$menu->setMenu($array_menu);
$menu->pintaMenu();


$menu2 = new MenuPlus;
$menu2->setMenu($array_menu);
$menu2->setEstilo("menu");
$menu2->pintaMenu();