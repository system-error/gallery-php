<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>

            <?php

//                    $user = new User();
//                    $user->username = "the_username";
//                    $user->password = "password";
//                    $user->first_name = "tester";
//                    $user->last_name = "testaki";
//
//                    $user->create();

//                    $user = User::findThisQueryById(5);
//                    $user->last_name = "kaladas tou kavourdiri tou kwsta";
//                    $user->update();
//                    $user = User::findThisQueryById(4);
//                    $user->delete();


            //$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    //print_r($user);
//         --------------------------------------------------------------------------
//                $resultAllUsers = User::findAll();
//
//                    foreach ($resultAllUsers as $user){
//                        echo $user->first_name."<br>";
//                    }
//                    echo"<br>";


//                $resultAllPhotos = Photo::findAll();
//
//                foreach ($resultAllPhotos as $photo){
//                    echo $photo->description."<br>";
//                }
//                echo"<br>";

//                $photo = new Photo();
//                $photo->description = "the photo";
//                $photo->type = "png";
//                $photo->title = "pho";
//                $photo->filename="dsgf.png";
//                $photo->size = "152000000000000000000";
//
//                $photo->create();

            echo INCLUDES_PATH."<br>";
            $photo = Photo::findThisQueryById(7);

            echo $photo->filename;

//            $user = User::findThisQueryById(7);
//            echo  $user->username;
//            echo "<br>";

            echo IMAGES_PATH;
            echo "<br>";

            $date = date("Y-m-d h:i:sa",strtotime($photo->uploadedAt));

//           foreach ($date as $key=>$d){
//               echo $key." = ".$d ."<br>";
//            }
            echo "<br>";
//           echo $date['seconds'];
//            echo "<br>";
            print_r($date);
            die();





//                while($row = mysqli_fetch_array($resultAllUsers)){
//                    echo $row['username']."<br>";
//                }
//         --------------------------------------------------------------------------
//                $resultUsersById = User::findThisQueryById(1);
//         --------------------------------------------------------------------------
//                echo $resultUsersById->username;

            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->