<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h2> Inserción de vivienda</h2>
    <form method="post" action="formvivienda.php">
        <fieldset>
            Selecciona el tipo de vivienda: <select name="vivienda">
                <option value="adosado">Adosado</option>
                <option value="unifamiliar">Unifamiliar</option>
                <option value="piso">Piso</option>
            </select><br>
            Selecciona la zona: <select name="zona">
                <option value="Centro">Centro</option>
                <option value="Periferia">Periferia</option>
            </select><br>
           Selecciona nº de habitaciones:
            1 <input type="radio" name="habitaciones" value="1">
            2 <input type="radio" name="habitaciones" value="2">
            3 <input type="radio" name="habitaciones" value="3"><br>
            Introduce precio:<input type="text" name="precio" /><br>
            Introduce tamaño:<input type="text" name="tamano" /><br>
            Selecciona los extras que necesites:
            <input type="checkbox" name="Garaje" value="Garaje">Garaje
            <input type="checkbox" name="Trastero" value="Trastero">Trastero
            <input type="checkbox" name="Piscina" value="Piscina">Piscina
            <br>
            <textarea name="observaciones" cols="50" rows="10"></textarea><br>
            <input type="submit" value="Enviar" />
        </fieldset>
    </form>
</body>

</html>