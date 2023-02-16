<?php

$d = new DateTime("2017/12/22"); 

$d = new DateTime("now"); 

$d = new DateTime(); 

echo $d->format('d-m-y');

echo "<br>";

echo $d->format('d-M-Y');


echo "<br>";

echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

echo "<hr>";

echo "The time is " . date("G:i:s");

echo "<hr>";

$pepino=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa", $pepino);

echo "<hr>";

// strtotime convierte fecha en el número de segundos
// transcurridos desde el 1 de enero de 1970
// hasta la fecha que se le indique

$d=strtotime("10:30pm April 15 2014");
//echo $d;
echo "Created date is " . date("d  m  Y h:i:sa", $d);

echo "<hr>";

$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";

echo "<hr>";

$d1=strtotime("July 04");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." days until 4th of July.";
?>