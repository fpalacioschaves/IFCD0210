<?php

class Prueba
{
    public static function saludar($argumento = null)
    {
        if ($argumento == null) echo 'Hola';
        else echo 'Hola ', $argumento;
    }
}

Prueba::saludar();
Prueba::saludar('mundo');

?>