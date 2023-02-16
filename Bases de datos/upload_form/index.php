<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de subida de archivo</title>
</head>
<body>

<form method="POST" action="upload.php" enctype="multipart/form-data">

    <span>Upload a File:</span>
    <input type="file" name="uploadedFile" />

    <input type="submit" name="uploadBtn" value="Upload" />



</form>
    
</body>
</html>