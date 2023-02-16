<?php
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

?>