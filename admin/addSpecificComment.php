<?php include("includes/header.php"); ?>
<?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
<?php


$message="";
if (isset($_POST['submit'])) {

    $comment = Comment::createComment($_GET['id'],$_POST['author'],$_POST['body']);
    $comment->save();

}

//    $date = date("Y-m-d h:i:sa",$photo->uploadedAt);
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <?php include("includes/top_nav.php"); ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("includes/side_nav.php"); ?>

    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Add New Comment
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-md-offset-3" >
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="author" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="Body">Body</label>
                            <input type="text" name="body" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Create" class="btn btn-primary pull-right">
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
<?php
