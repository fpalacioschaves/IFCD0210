<?php
class Empleado
{
    //Atributos
	public $first_name;
	public $last_name;
	public $age;

	// Metodos
	public function getFirstName()
		{
		return $this->first_name;
		}
	public function getLastName()
		{
		return $this->last_name;
		}

	public function getAge()
	{
		return $this->age;
	}

    public function setAge($edad){
        $this->age = $edad;
    }
}

$empleado1 = new Empleado();

$empleado1->first_name = "Manolo";
$empleado1->last_name = "Pérez";
$empleado1->age = 35;

echo "<pre>";
var_dump($empleado1);
echo "</pre>";

echo "La edad del empleado es " . $empleado1->getAge();

$empleado2 = new Empleado();

$empleado2->first_name = "Antonio";
$empleado2->last_name = "Sánchez";
echo "<br>";
echo $empleado2->getFirstName();

echo "<br>";
$empleado2->age = 50;
echo "<br>";
echo "La edad del empleado es " . $empleado2->getAge();
echo "<br>";
$empleado2->setAge(20);
echo "<br>";
echo "La edad del empleado es " .  $empleado2->getAge();

?>