<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>

            <?php
                    //$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    //print_r($user);
//            --------------------------------------------------------------------
                $resultAllUsers = User::findAllUsers();

                    foreach ($resultAllUsers as $user){
                        echo $user->first_name."<br>";
                    }
//                while($row = mysqli_fetch_array($resultAllUsers)){
//                    echo $row['username']."<br>";
//                }
//         --------------------------------------------------------------------------
                $resultUsersById = User::findTheUserById(1);
//         --------------------------------------------------------------------------
                foreach ($resultUsersById as $user){
                    echo $user->first_name;
                }






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