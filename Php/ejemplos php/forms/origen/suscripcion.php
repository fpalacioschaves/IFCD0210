<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Suscripción boletín</title> 
<style type="text/css">
h1 { text-align: center; }
td { padding: 0.2em 2em ; }
</style>

</head>
<body>
<h1>Suscripción electronica a nuestro boletín.</h1>
<p>Nota: Este es un formulario de ejemplo en el que los datos aquí escritos se 
trasladan a otra página.</p>
<form action="comprobar.php" method="post"/>

<p>Nombre: <input type="text" name="nombre"/>   
   Apellidos: <input type="text" name="apellidos" size="40"/>   
   e-mail: <input type="text" name="email" size="35"/></p>
<p>contraseña: <input type="password" name="contras"/><br/>
<table>
   <tr>
   <td>
   sexo<br/>
   <input type="radio" name="sexo" value="V"/> Varón<br/>
   <input type="radio" name="sexo" value="M"/> Mujer</p>
   </td>
   <td>
   Nivel de estudios<br/>
   <input type="radio" name="estudios" value="elemental" checked="checked">
     Certificado escolar<br/>
   <input type="radio" name="estudios" value="basico"/> 
     Graduado en E.S.O.<br/>
   <input type="radio" name="estudios" value="bachiller"/> 
     Bachiller - Formación Profesional <br/>
   <input type="radio" name="estudios" value="Diplomado"/> 
     Diplomado<br/>
   <input type="radio" name="estudios" value="licenciado"/> 
     Licenciado o Doctorado<br/>
   </td>
   <td>
   Interesado en los siguientes temas: <br/>
   <input type="checkbox" name="musica"/> Música<br/>
   <input type="checkbox" name="deportes"/> Deportes<br/>
   <input type="checkbox" name="cine"/> Cine<br/>
   <input type="checkbox" name="libros"/> Libros<br/>
   <input type="checkbox" name="ciencia"/> Ciencia</p>
   </td>
   </tr>
</table>
<p>Día de la semana que le interesa recibirlo:</p>
<select name="dia">
    <option>día de la semana:</option> 
    <option value="">lunes</option> 
    <option value="Martes">martes</option> 
    <option value="Miércoles">miercoles</option> 
    <option value="Jueves">jueves</option> 
    <option value="Viernes">viernes</option> 
    <option value="Sábado">sábado</option> 
    <option value="Domingo">domingo</option> 
</select>
</p>
<p>Su opinión: <br/>
<textarea name="comentario" rows="5" cols="50">Comentario: </textarea>
<p><input type="submit" value="Comprobar el formulario"> 
   <input type="reset" value="borrar todo"></p>
</form>
</body>
</html>
En este formulario hemos querido incluir al menos un campo de cada tipo, para que se vean los resultados del traslado de datos.


Página de comprobación de datos
Los resultados los veremos en la página "comprobar.php" la cual la colocaremos en la misma carpeta que el archivo anterior (por supuesto dentro del directorio "XAMPP/htdocs").

Está será la página "comprobar.php".


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Comprobar datos</title> 

</head>
<body>
<h1>Tus Datos de suscripción: </h1>
<p>Estos son los datos que nos has enviado:</p>
<?php  
echo "Nombre: "; echo $_POST['nombre']; echo "<br/>";
echo "apellidos: "; echo $_POST['apellidos']; echo "<br/>";
echo "E-mail: "; echo $_POST['email']; echo "<br/>";
echo "contraseña: "; echo $_POST['contras']; echo "<br/>";
echo "Sexo: "; echo $_POST['sexo']; echo "<br/>";
echo "Estudios: "; echo $_POST['estudios']; echo "<br/>";
echo "Aficiones: \"on\" seleccionado, sin marcar, no seleccionado<br/>";
echo "Musica: "; echo $_POST['musica']; echo "<br/>";
echo "Deportes: "; echo $_POST['deportes']; echo "<br/>";
echo "Cine: "; echo $_POST['cine']; echo "<br/>";
echo "Libros: "; echo $_POST['libros']; echo "<br/>";
echo "Ciencia: "; echo $_POST['ciencia']; echo "<br/><br/>";
echo "Día de la semana: "; echo $_POST['dia']; echo "<br/>";
echo "Tu comentario: "; echo $_POST['comentario']; echo "<br/>";
?>
<p>Comprueba tus datos antes de enviarlos, si no están bien vuelve a escribirlos.</p>
<p>Los datos son correctos: <a href="form.html">Enviar</a>
<p>Los datos no son correctos: <a href="enviar.html">Volver a escribirlos</a>

</body>
</html>