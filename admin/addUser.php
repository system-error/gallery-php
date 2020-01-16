    <?php include("includes/header.php"); ?>
    <?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
    <?php

            $user = new User();
            $message="";
            if (isset($_POST['submit'])) {

                $user->userAddValues($user);
                $user->setFile($_FILES['userImage']);
                    if($user->saveUserImage()){
                        $message = "Photo uploaded successfully";
                    }else{
                        $message = join("<br>",$user->customErrors);
                    }

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
                        Add New User
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
                            <?php echo $message; ?>
                            <div class="form-group">
                                <label for="file">File Upload</label>
                                <input type="file" name="userImage" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="username" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" class="form-control" value="">
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
