<?php
class Auto{
    public $matricula;
    public $kilometros;
    public $marca;
    public $modelo;

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

    public function setKilometros($kilometros){
        if($kilometros > 0){
            $this->kilometros = $kilometros;
        }
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function pasar_itv(){
        if($this->kilometros > 20000){
            echo "Debe pasar la ITV";
        }
    }
    public function actualizar_kilometros($kilometros){
        if($kilometros > 0){
            $this->kilometros += $kilometros;
            $this->pasar_itv();
        }
    }
}

$coche1 = new Auto();

$coche1->setMatricula("1234BTW");
$coche1->setMarca("Audi");
$coche1->setModelo("A3");
$coche1->setKilometros(15000);

print_r($coche1);
echo "<br>";

$coche1->actualizar_kilometros(-500);
print_r($coche1);
echo "<br>";

$coche1->actualizar_kilometros(6700);
//print_r($coche1);
echo "<br>";

echo $coche1->kilometros;