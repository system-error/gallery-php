<?php include("includes/init.php"); ?>
<?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
<?php

    if(empty($_GET['id'])){
        redirect("../photos.php");
    }else{
        $photo = photo::findThisQueryById($_GET['id']);
    }

    if($photo){
        $photo->deleteImage();
        redirect("photos.php");
    }else{
        redirect("photos.php");
    }

?>