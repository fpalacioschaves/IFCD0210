<html>
<head>
<title></title>
</head>
<body>
<?php
class Operacion {
  protected $valor1;
  protected $valor2;
  protected $resultado;

  public function setValor1($valor1)
  {
    $this->valor1=$valor1;
  }
  public function setValor2($valor2)
  {
    $this->valor2=$valor2;
  }
  public function imprimirResultado()
  {
    echo $this->resultado.'<br>';
  }
  
}

class Suma extends Operacion{
  public function operar()
  {
    $this->resultado=$this->valor1+$this->valor2;
  }
}

class Resta extends Operacion{
  public function operar()
  {
    $this->resultado=$this->valor1-$this->valor2;
  }
}

$suma=new Suma();
$suma->setValor1(10);
$suma->setValor2(10);
$suma->operar();
echo 'El resultado de la suma de 10+10 es:';
$suma->imprimirResultado();


$resta=new Resta();
$resta->setValor1(10);
$resta->setValor2(5);
$resta->operar();
echo 'El resultado de la diferencia de 10-5 es:';
$resta->imprimirResultado();

?>
</body>
</html>