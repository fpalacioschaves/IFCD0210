<html>
<head>
<title>Suscripción Boletín</title> 
<style type="text/css">
h1 { text-align: center; }
td { padding: 0.2em 2em ; }
</style>

</head>
<body>
<h3>Suscripción electrónica a nuestro boletín.</h3>
<p>Nota: Este es un formulario de ejemplo en el que los datos aquí escritos se 
trasladan a otra página.</p>
<form action="comprobar.php" method="post"/>

<p>Nombre: <input type="text" name="nombre"/></p>  
<p>Apellidos: <input type="text" name="apellidos" size="40"/></p>   
<p>e-mail: <input type="text" name="email" size="35"/></p>
   
<p>UserName: <input type="text" name="username"/></p>
<p>UserPass: <input type="password" name="userpass"/></p>
<table>
   <tr>
   <td>
   Sexo<br/>
   <input type="radio" name="sexo" value="V"/> Varón<br/>
   <input type="radio" name="sexo" value="M"/> Mujer</p>
   </td>
   <td>
   Nivel de estudios<br/>
   <input type="radio" name="estudios" value="elemental" checked="checked">
     Cdo Escolar<br/>
   <input type="radio" name="estudios" value="basico"/> 
     Gdo ESO<br/>
   <input type="radio" name="estudios" value="bachiller"/> 
     Bachiller - FP <br/>
   <input type="radio" name="estudios" value="Diplomado"/> 
     Diplomado<br/>
   <input type="radio" name="estudios" value="licenciado"/> 
     Licenciado - Doctorado<br/>
   </td>
   <td>
   Interesado en los siguientes temas: <br/>
	<input type="checkbox" name="temas[]" value="Música">Musica</input><br/>
	<input type="checkbox" name="temas[]" value="Deportes">Deportes</input><br/>
	<input type="checkbox" name="temas[]" value="Cine">Cine</input><br/>
	<input type="checkbox" name="temas[]" value="Libros">Libros</input><br/>
	<input type="checkbox" name="temas[]" value="Ciencia">Ciencia</input><br/>
   </td>
   </tr>
</table>
<p>Día de la semana que le interesa recibirlo:</p>
<select name="dia">
    <option>día de la semana:</option> 
    <option value="Lunes">lunes</option> 
    <option value="Martes">martes</option> 
    <option value="Miércoles">miercoles</option> 
    <option value="Jueves">jueves</option> 
    <option value="Viernes">viernes</option> 
    <option value="Sábado">sabado</option> 
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
