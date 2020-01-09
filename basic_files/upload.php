<?php

    if(isset($_POST['submit'])){
        echo "<pre>";

        print_r($_FILES['fileUpload']);

        echo "</pre>";

        $uploadErrors = array(
          UPLOAD_ERR_OK => "There is no error",
          UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_file_size directive",
          UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE",
          UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
          UPLOAD_ERR_NO_FILE => "No file was uploaded.",
          UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder. Introduced in PHP 5.0.3",
          UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk. Introduced in PHP 5.1.0",
          UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
        );

        $fileDest = $_FILES['fileUpload']['tmp_name'];
        $fileName = $_FILES['fileUpload']['name'];
        $folder = "uploads";

        if(move_uploaded_file($fileDest,$folder."/".$fileName)){

            $message="File Uploaded Succesfully";
        }else{

            $errorCode = $_FILES['fileUpload']['error'];
            $message = $uploadErrors[$errorCode];
        }

    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" enctype="multipart/form-data" method="post">
        <h2><?php
                if(!empty($uploadErrors)){
                    echo $message;
                }
            ?>
        </h2>

        <input type="file" name="fileUpload"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>
