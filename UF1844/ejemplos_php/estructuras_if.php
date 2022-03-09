<?php
//IF
$age = 50;

if ($age > 30)
{
	//echo "Your age is greater than 30!";
}


//If...else
$age = 50;

if ($age < 30)
{
	//echo "Your age is less than 30!";
}
else
{
	//echo "Your age is greater than or equal 30!";
}


//If...elseif

if ($age < 30)
{
	echo "Your age is less than 30!";
}
elseif ($age > 30 && $age < 40)
{
	echo "Your age is between 30 and 40!";
}
elseif ($age > 40 && $age < 50)
{
	echo "Your age is between 40 and 50!";
}
else
{
	echo "Your age is greater than 50!";
}

?>