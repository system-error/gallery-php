<?php include("includes/header.php"); ?>
<?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
<?php $users =  user::findAll(); ?>
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
                    users
                </h1>
                <a href="addUser.php" class="btn btn-primary" >Add User</a>

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
                            <th>Photo</th>
                            <th>User Name</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><img class="admin-user-thumbnail" src="<?php echo $user->imagePath() ?>" width="150" height="150" alt=""></td>
                                <td><?php echo $user->username; ?>
                                    <div class="action-links">
                                        <a href="deleteUser.php?id=<?php echo $user->id; ?>">Delete</a>
                                        <a href="editUser.php?id=<?php echo $user->id; ?>">Edit</a>
                                    </div>
                                </td>

                                <td><?php echo $user->first_name; ?></td>
                                <td><?php echo $user->last_name; ?></td>
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
