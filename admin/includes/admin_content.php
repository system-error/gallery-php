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

//                    $user = User::findTheUserById(5);
//                    $user->last_name = "kaladas tou kavourdiri tou kwsta";
//                    $user->update();
//                    $user = User::findTheUserById(3);
//                    $user->delete();


            //$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    //print_r($user);
//         --------------------------------------------------------------------------
                $resultAllUsers = User::findAll();

                    foreach ($resultAllUsers as $user){
                        echo $user->first_name."<br>";
                    }
                    echo"<br>";
//                while($row = mysqli_fetch_array($resultAllUsers)){
//                    echo $row['username']."<br>";
//                }
//         --------------------------------------------------------------------------
                $resultUsersById = User::findThisQueryById(1);
//         --------------------------------------------------------------------------
                echo $resultUsersById->username;

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