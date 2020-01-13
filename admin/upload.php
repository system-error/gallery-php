    <?php include("includes/header.php"); ?>
    <?php if(!$session->isLoggedIn()){redirect("login.php");} ?>
    <?php
    $message="";
    if (isset($_POST['submit'])){
        $photo = new photo();
        $photo->title = $_POST['title'];
        $photo->setFile($_FILES['fileUpload']);

        if($photo->save()){
            $message = "Photo uploaded succesfully";
        }else{
            $message = join("<br>",$photo->uploadErrors);
        }
    }

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
                        Upload
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-6">
                        <?php echo $message;?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="title" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="fileUpload" id="" >
                            </div>
                            <input type="submit" name="submit" id="">
                        </form>
                    </div>






<!--                    <ol class="breadcrumb">-->
<!--                        <li>-->
<!--                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>-->
<!--                        </li>-->
<!--                        <li class="active">-->
<!--                            <i class="fa fa-file"></i> Blank Page-->
<!--                        </li>-->
<!--                    </ol>-->
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>
