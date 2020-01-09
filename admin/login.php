<?php require_once("includes/header.php");?>
<?php


    if($session->isLoggedIn()){
        redirect("index.php");
    }

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Function to check database user table

        $userFound = User::verifyUser($username,$password);

        if($userFound){
            $session->login($userFound);
            redirect("index.php");
        }else{
            $errorMessage = "Your password or username are wrong";
        }
    }else{
        $username = "";
        $password = "";
        $errorMessage ="";
    }
?>

<div class="col-md-4 col-md-offset-3">
    <h4 class="bg-danger"><?php echo $errorMessage ?></h4>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
    </form>
</div>