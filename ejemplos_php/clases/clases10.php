<?php

abstract class CocheAbstract {

	public function getRuedas()
	{
		return 4;
	}
	abstract public function setPotencia($potencia);
	abstract public function getPotencia();
}

class Audi extends CocheAbstract {
	public $brand = 'Audi';
	protected $potencia;
	public function setPotencia($potencia)
	{
		$this->potencia = $potencia;
	}
	public function getPotencia()
	{
		return $this->potencia;
	}
}

$coche = new Audi;
/*-------------------------------*/


interface Automovil {
	public function getTipo();
	public function getRuedas();
}


class Coche implements Automovil {
	public function getTipo(){
		echo "Coche";	
	}
	public function getRuedas(){
		echo "4";
	}
}
class Moto implements Automovil {
	public function getTipo(){
		echo "Moto";
	}
	public function getRuedas(){
		echo "2";
	}
}
