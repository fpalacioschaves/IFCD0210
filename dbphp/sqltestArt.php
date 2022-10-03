
<?php // sqltest.php // inserción y borrado de datos utilizando sqltest.php pag. 256
 require_once 'loginPedidos.php';
 $conn = new mysqli ($hn, $un, $pw, $db);
 if ($conn->connect_error) die("DB Pedidos CNX Error");
 
 if (isset($_POST['delete']) && isset($_POST['CodArt']))
 {
   $codart   = get_post($conn, 'CodArt');
   $sql  = "DELETE FROM Articulo WHERE CodArt='$codart'";
   $result = $conn->query($sql);
   if (!$result) echo "DELETE Failed <br><br>";
 }   
 
 
 if (isset($_POST['CodArt']) &&
     isset($_POST['DesArt']) &&
     isset($_POST['PVPArt']))
{
   $codart = get_post($conn, 'CodArt');
   $desart = get_post($conn, 'DesArt');
   $pvpart = get_post($conn, 'PVPArt');
   // INSERT INTO `articulo`(`CodArt`, `DesArt`, `PVPArt`) VALUES ('[value-1]','[value-2]','[value-3]')
   $sql    = "INSERT INTO articulo(CodArt,DesArt,PVPArt) VALUES " .
     "('".$codart."','".$desart."','".$pvpart."')";
   $result = $conn->query($sql);
   if (!$result) echo "INSERT Failed <br><br>";
}
echo 
<<<_END
<form action="sqltestart.php" method="post"> 
<pre>
  Código ....: <input type="text" name="CodArt">
  Descripción: <input type="text" name="DesArt">
  PVP (€) ...: <input type="float" name="PVPArt">

  <input type="submit" value="ADD RECORD">
</pre>
</form>
_END;

  $sql = "SELECT * FROM Articulo";
  $result = $conn->query($sql);
  if (!$result) die ("Database access failed");
  
  $rows = $result->num_rows;
  echo 
  
  
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_NUM);
	
    $r0 = htmlspecialchars($row[0]);
    $r1 = htmlspecialchars($row[1]);
	$r2 = htmlspecialchars($row[2]);

    echo 
<<<_END
<pre>
         Código $r0
    Descripción $r1
            PVP $r2
</pre>
   <form action='sqltestart.php' method='post'>
   <input type='hidden' name='delete' value='yes'>
   <input type='hidden' name='CodArt' value='$r0'>
   <input type='submit' value='DELETE RECORD'></form>
_END;
  }
  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
  
