    <?php include("includes/header.php"); ?>
    <?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
    <?php

            if(empty($_GET['id'])){
                redirect("users.php");
            }
            $user = User::findThisQueryById($_GET['id']);
            $message="";
            if (isset($_POST['update'])){
                $user->userAddValues($user);

                if(empty($_FILES['userImage'])){
                    $user->save();
                }else{
                    $user->setFile($_FILES['userImage']);
                    if($user->saveUserImage()){
                        $message = "Photo uploaded succesfully";
                    }
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
                    <div class="col-md-3">
                            <label for="Image">My Image</label>
                            <img class="img-responsive" src="<?php echo $user->imagePath(); ?>" alt="" width="250" height="250">
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-7" >
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>">
                            </div>
                            <div class="form-group">
                                <label for="FirstName">First Name</label>
                                <input type="text" name="firstName" class="form-control" value="<?php echo $user->first_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="LastName">Last Name</label>
                                <input type="text" name="lastName" class="form-control" value="<?php echo $user->last_name; ?>">
                            </div>
                            <?php echo $message; ?>
                            <div class="form-group">
                                <label for="file">Image Upload</label>
                                <input type="file" name="userImage" class="form-control">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="description">Last Name</label>-->
<!--                                <textarea class="form-control" name="lastName"  cols="30" rows="10" ></textarea>-->
<!--                            </div>-->
                            <div class="info-box-footer clearfix">
                                <div class="info-box-delete pull-left">
                                    <a  href="deleteUser.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                </div>
                                <div class="info-box-update pull-right ">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
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
