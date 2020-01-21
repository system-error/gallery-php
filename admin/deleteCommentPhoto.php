<?php include("includes/init.php"); ?>
<?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
<?php

if(empty($_GET['id'])){
    redirect('comments.php');
}else{
    $comment = Comment::findThisQueryById($_GET['id']);

    if($comment){
        $comment->delete();
        redirect("commentPhotos.php?id{$comment->photoId}");
    }else{
        redirect("commentPhotos.php?id{$comment->photoId}");
    }
}


