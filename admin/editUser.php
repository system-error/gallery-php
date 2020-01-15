    <?php include("includes/header.php"); ?>
    <?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
    <?php

            if(empty($_GET['id'])){
                redirect("users.php");
            }
            $user = User::findThisQueryById($_GET['id']);
            if (isset($_POST['update'])){
                if($user){
                    $user->username = $_POST['username'];
                    $user->password = $_POST['password'];
                    $user->first_name = $_POST['firstName'];
                    $user->last_name = $_POST['lastName'];
                    $user->save();
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
                        Edit User
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
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">
                            </div>
                            <div class="form-group">
                                <a  class="thumbnail" href="#"><img src="<?php echo $user->imagePath() ?>" alt="" width="150" height="150"></a>

                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->password ?>">
                            </div>
                            <div class="form-group">
                                <label for="FirstName">First Name</label>
                                <input type="text" name="firstName" class="form-control" value="<?php echo $user->first_name ?>">
                            </div>
                            <div class="form-group">
                                <label for="LastName">Last Name</label>
                                <input type="text" name="lastName" class="form-control" value="<?php echo $user->last_name ?>">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="description">Last Name</label>-->
<!--                                <textarea class="form-control" name="lastName"  cols="30" rows="10" ></textarea>-->
<!--                            </div>-->
                        </div>
                        <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                    <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                    <div class="box-inner">
                                        <p class="text">
                                            <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                        </p>
                                        <p class="text ">
                                            Photo Id: <span class="data photo_id_box"></span>
                                        </p>
                                        <p class="text">
                                            Filename: <span class="data"></span>
                                        </p>
                                        <p class="text">
                                            File Type: <span class="data"></span>
                                        </p>
                                        <p class="text">
                                            File Size: <span class="data"> KB</span>
                                        </p>
                                    </div>
                                    <div class="info-box-footer clearfix">
                                        <div class="info-box-delete pull-left">
                                            <a  href="deleteImage.php?id=" class="btn btn-danger btn-lg ">Delete</a>
                                        </div>
                                        <div class="info-box-update pull-right ">
                                            <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                        </div>
                                    </div>
                                </div>
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
