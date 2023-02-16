<?php
class Employee
{
	public $first_name;
	public $last_name;
	public $age;

	/*public function __construct($first_name, $last_name, $age)
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->age = $age;
	}*/

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
}


$empleado1 = new Employee;
$empleado1->first_name = "Manolo";
$empleado1->last_name = "López";
$empleado1->age = 45;


$empleado2 = new Employee;
$empleado2->first_name = "Antonio";
$empleado2->last_name = "Pérez";
$empleado2->age = 65;

//print_r($empleado1);
//print_r($empleado2);

echo $empleado1->first_name;
echo "<br>";
echo $empleado1->getFirstName();


?>
