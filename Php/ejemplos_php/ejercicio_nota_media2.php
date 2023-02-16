<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        width: 50%;
        margin: 0 auto;
        
    }
    td{
        border: 1px solid #ccc;
        text-align: center;
    }

    .par{
        background-color: red;
    }
    .impar{
        background-color: green;
    }
 </style>
<body>
    <?php
    $notas_alumnos = array(6.5,8,9.1,7.5,9,8.1,3.5,7, 6.1);
   
    function nota_media($notas_alumnos){
        $numero_alumnos = count($notas_alumnos);
        $suma = 0;
        foreach($notas_alumnos as $nota){
            $suma = $suma + $nota;
        }
        $media = $suma / $numero_alumnos;

        return $media;
    }

    function nota_media2($notas_alumnos){
        $numero_alumnos = count($notas_alumnos);
        $suma = 0;
        for($i = 0; $i < $numero_alumnos ; $i++){
            $suma = $suma + $notas_alumnos[$i];
        }

        $media = $suma / $numero_alumnos;

        return $media;
    }

    echo " La media es " . nota_media($notas_alumnos);
    echo "<br>";
    echo " La media es " . nota_media2($notas_alumnos);
    
    





?>
</body>
</html>