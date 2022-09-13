<?php

if($_POST){

    if (isset($_FILES['uploadedFile']) ){

        $fileTmpPath = $_FILES['uploadedFile']['tmp_name']; // carpeta y nombre temporal
        $fileName = $_FILES['uploadedFile']['name']; // nombre del archivo
        $fileSize = $_FILES['uploadedFile']['size'];  //tamaño del archivo en bytes
        $fileType = $_FILES['uploadedFile']['type'];  // tipo de archivo



        $fileNameCmps = explode(".", $fileName); // descompone el nombre por .
        $fileExtension = strtolower(end($fileNameCmps)); // coge la extensión
        // ultimo elemento del array y la convierte en minusculas

         // sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        //echo "Nuevo nombre: $newFileName <br>"; 

        // Array de extensiones permitidas
        $allowedfileExtensions = array('jpg', 'gif', 'png');
        $max_file_size = 200000;

        if (in_array($fileExtension, $allowedfileExtensions) && $fileSize < $max_file_size  ){

            $uploadFileDir = './upload_files/'; // carpeta a la que movemos los archivos
            $dest_path = $uploadFileDir . $newFileName;
      
            if(move_uploaded_file($fileTmpPath, $dest_path)) 
            {
                header("Location: index.php");
            }
            else{
                echo "ALGO VA MAL";
            }
        }
        else {
            echo "Extensión no permitida o tamaño maximo excedido";
        }

    }
}


?>