<?php
class greeting {
  public function welcome() {
    echo "Hello World!";
  }
}

/* Una clase normal y corriente como el agua de la fuente */
$saludo = new greeting;
$saludo->welcome();

/* Una clase con método estático */
class greeting2 {
    public static function welcome() {
      echo "Hello World!";
    }

    public function saludar(){
        echo "HOLA CARACOLA";
    }
  }
  
  // Call static method
  greeting2::welcome();

  