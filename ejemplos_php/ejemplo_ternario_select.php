<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">

    <?php if($_POST){
        $seleccionado = $_POST["seleccion"];
        print_r($_POST);
    }
    ?>
    
    <select name="seleccion" id="seleccion">
        <option value="valor1" <?php if($seleccionado == "valor1"){ echo "selected";}else{echo "";}   ?>>Valor 1</option>
        <option value="valor2" <?php echo ($seleccionado == "valor2" ? "selected" : "");   ?>>Valor 2</option>
        <option value="valor3" <?php echo ($seleccionado == "valor3" ? "selected" : "");   ?>>Valor 3</option>
        <option value="valor4" <?php echo ($seleccionado == "valor4" ? "selected" : "");   ?>>Valor 4</option>
        <option value="valor5" <?php echo ($seleccionado == "valor5" ? "selected" : "");   ?>>Valor 5</option>
    </select>

    <textarea name="mensaje" id="mensaje"><?php echo (isset($_POST["mensaje"]) ? $_POST["mensaje"] : "");?></textarea>

    <input type="submit" value="Enviar">


    </form>
</body>
</html>