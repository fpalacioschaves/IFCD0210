<?php	// listArt.php - pdf254 - pág234
// Enviar una consulta a MySQL desde PHP es tan sencillo como incluir el SQL
// correspondiente en el método mysqli_query() de un objeto de conexión ($conn).
require_once 'loginPedidos.php';
$conn = new mysqli($hn, $un, $pw, $db);					// Crea el objeto de conexión

if ($conn->connect_error) die ("DB Pedidos CNX Error"); // Testea el método mysqli_connect_error

$sql  = "SELECT * FROM Articulo";		// $sql = Consulta entre comillas sin ;

// $sql se pasa al método mysqli_query(consulta) del objeto $conn, 
// cuyo resultado almacenamos en el objeto $result
$result = $conn->query($sql);	

// Si $result es FALSE, ha habido un problema y la propiedad "mysqli_error" del objeto de conexión
//  contendrá los detalles, por lo que se llama a la función die() para visualizar ese error.
if (!$result) die ("DB Pedidos SELECT Error");

// El objeto $result contiene los datos recibidos de MySQL. 
// Estos datos pueden ser consultados mediante varios métodos 
// En primer lugar extraemos el número de resultados / filas / rows
$rows = $result->num_rows;
echo "<br> Núm Resultados: ". $rows. "<br><br>";

// Ahora extraemos filas individuales cargando la matriz asociativa $fila
// y leyendo el objeto mysqli_fetch_assoc() ['NombreCampo']
for( $j = 0 ; $j < $rows ; ++$j)
{
	$fila = $result->fetch_array(MYSQLI_ASSOC);

	echo 'Codigo.....: '. htmlspecialchars($fila['CodArt']) . '<br>';
	echo 'Descripción: '. htmlspecialchars($fila['DesArt']) . '<br>';
	echo 'PVP........: '. htmlspecialchars($fila['PVPArt']) . '<br>';

	echo '<br><br>';
}	
$result -> close();		// Cerramos el objeto-consulta
$conn -> close();		// Cerramos el objeto-conexión
?>