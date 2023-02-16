<?php
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$salario = $_POST["salario"];

if($nombre == "" || $edad == "" || $salario == ""){
    echo "Faltan datos";
}

if($edad < 18){
    echo "No tienes edad para trabajar";
}

if($salario > 40000){
    echo "Deben aplicarte más retenciones";
}