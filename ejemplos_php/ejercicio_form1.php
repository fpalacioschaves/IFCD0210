<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $array_users= array(
        "usuario1" => array ("user" => "admin", "password" => "1234"),
        "usuario2" => array ("user" => "user", "password" => "qwer"),
        "usuario3" => array ("user" => "root", "password" => "root"),
        "usuario4" => array ("user" => "paco", "password" => "abcd")
    );
    if($_POST){
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $logado = false;

        foreach($array_users as $key => $item){
            if($user == $item["user"] && $pass== $item["password"]){
                echo "Bienvenido";
                $logado = true;
                break;
            }
            
        }
        if($logado == false){
            echo "Hay un error en el formulario";
            include("include_form.php");
        } 
    }
    else{
       include("include_form.php");
    }
    ?>
</body>
</html>