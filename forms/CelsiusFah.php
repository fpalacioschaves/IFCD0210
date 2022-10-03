<?php // CelsiusFh.php
 $f = $c = '';
 if (isset($_POST['f'])) $f = $_POST['f'];
 if (isset($_POST['c'])) $c = $_POST['c'];
 if (is_numeric($f))
 {
	$c = intval((5 / 9) * ($f - 32));
	$out = "$f &deg;f equals $c &deg;c";
 }
 elseif(is_numeric($c))
 {
	$f = intval((9 / 5) * $c + 32);
	$out = "$c &deg;c son $f &deg;f";
 }
 else $out = "";
 echo 
<<<_END
	<html>
	<head>
		<title>CelsiusFh.php</title>
	</head>
<body>
<pre>
	<h3>	Conversor Fahrenheit / Celsius</h3>
	Introduzca ºC ó ºF y click en Convertir
	<b>$out</b>
	<form method="post" action="">
	Fahrenheit: <input type="text" name="f" size="7">
	
	Celsius ..: <input type="text" name="c" size="7">
	
	<input type="submit" value="Convertir">
	</form>
</pre>
</body>
</html>
_END;
 function sanitizeString($var)
 {
	if (get_magic_quotes_gpc())
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var); 
	return $var;
 }
?>