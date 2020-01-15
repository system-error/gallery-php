<?php include("includes/init.php"); ?>
<?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
<?php

if(empty($_GET['id'])){
    redirect('users.php');
}else{
    $user = User::findThisQueryById($_GET['id']);

    if($user){
        $user->deleteUser();
        redirect("users.php");
    }else{
        redirect("users.php");
    }
}


