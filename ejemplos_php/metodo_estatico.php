<?php 
class nombreClase
    {
        public static function métodoEstatico ()
        {
            return "Hey, soy un método estático";
        }
    }
    
echo nombreClase::métodoEstatico();