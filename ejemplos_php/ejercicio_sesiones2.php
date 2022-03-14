<?php
class Login{
    private $username;
    private $password;

    public function __construct($username, $password){
        session_start();
        $this->username = $username;
        $this->password = $password;
    }

    public function guardar_sesion(){
        
        $_SESSION["usuario"] = $this->username;
        $_SESSION["password"] = $this->password;
    }

    public function borrar_sesion(){
        $_SESSION = array();
    }

}

$login = new Login("fpalacioschaves", "grespelen_601");

$login->guardar_sesion();

print_r($_SESSION);

$login->borrar_sesion();

print_r($_SESSION);
?>