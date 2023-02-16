<?php 
class ApptivaDB{    
    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="";
    private $db     ="test";
    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->host, $this->usuario, $this->clave,$this->db)
        or die(mysql_error());
        $this->conexion->set_charset("utf8");
    }
    //INSERTAR
    public function insertar($tabla, $datos){
        $resultado =    $this->conexion->query("INSERT INTO $tabla VALUES (null,$datos)") or die($this->conexion->error);
        if($resultado)
            return true;
        return false;
    } 
    //BORRAR
    public function borrar($tabla, $condicion){    
        $resultado  =   $this->conexion->query("DELETE FROM $tabla WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return true;
        return false;
    }
    //ACTUALIZAR
    public function actualizar($tabla, $campos, $condicion){    
        $resultado  =   $this->conexion->query("UPDATE $tabla SET $campos WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return true;
        return false;        
    } 
    //BUSCAR
    public function buscar($tabla, $condicion){
        $resultado = $this->conexion->query("SELECT * FROM $tabla WHERE $condicion") or die($this->conexion->error);
        if($resultado)
            return $resultado->fetch_all(MYSQLI_ASSOC);
        return false;
    } 
}



//// COMO SE USA
$user = new ApptivaDB();

$u=$user->insertar("usuarios","'PAPA','JUAN PABLO','foto.jpg'");
if($u)
   echo "Insertado";
else
 echo "No insertado";

// BUSCAR
 if($resultado=$user->buscar("usuarios","1"))
 foreach ($resultado as $value)
    echo $value['id']."-".$value['nombre']."<br>";
else
  echo  "No hay registros";


// ACTUALIZAR
$u=$user->actualizar("usuarios","nombre='ANAMARIA'","id=1");
if($u)
   echo "Actualizado";
else
   echo "No actualizado";


// ELIMINAR
$u=$user->borrar("usuarios","id=1");
if($u)
    echo "Borrado";
else
   echo "No borrado";
?>