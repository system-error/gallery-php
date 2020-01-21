<?php include("includes/header.php"); ?>
<?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
<?php

    if(empty($_GET['id'])){
        redirect('photos.php');
    }

    $comments = Comment::findTheComment($_GET['id']);

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
                    Comments
                </h1>
                <a href="addSpecificComment.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary" >Add Comment</a>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
<!--                            <th>Photo Id</th>-->
                            <th>Author</th>
                            <th>Body</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($comments as $comment) : ?>
                            <tr>
                                <td><?php echo $comment->id; ?></td>
<!--                                <td><img class="admin-user-thumbnail" src="--><?php //echo $comment->imagePath() ?><!--" width="150" height="150" alt=""></td>-->
                                <td><?php echo $comment->author; ?>
                                    <div class="action-links">
                                        <a href="deleteComment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                        <a href="editComment.php?id=<?php echo $comment->id; ?>">Edit</a>
                                    </div>
                                </td>
                                <td><?php echo $comment->body; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table> <!--End of table-->

                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
