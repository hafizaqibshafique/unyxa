<?php include 'includes/header2.php';?>
<?php

if (isset($_POST['login'])) 
{


    if(isset($_POST['user_name']) && isset($_POST['user_password']))
    {
       $username = mysqli_real_escape_string($conn,$_POST['user_name']) ;
       $password = mysqli_real_escape_string($conn,$_POST['user_password']);
       $query = "SELECT * FROM `admin` WHERE user_name='$username';";
       $result = mysqli_query($conn, $query);
       if (mysqli_num_rows($result) > 0) 
       {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['user_password']))
        {
            if(!empty($_POST["remember_password"]))
            {
                setcookie ("user_name",$username,time()+ (10 * 365 * 24 * 60 * 60));  
                setcookie ("user_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
            }
            else
            {
                if(isset($_COOKIE["user_name"]))
                {
                    setcookie ("user_name","");
                }
                if(isset($_COOKIE["user_password"]))
                {
                    setcookie ("user_password","");
                }

            }
           /* $_SESSION["user_id"]=$row['user_id'];*/
            $_SESSION["user_name"]=$row['user_name'];
            $_SESSION["user_email"]=$row['user_email'];
            $_SESSION['last_login_timestamp'] = time(); 
            $message = 'Login Successfull';
            //echo'<script>alert("Login Successfull")</script>';
            echo("<script>window.location = 'index.php';</script>");

        }
        else
        {
            $message = 'Invalid Credentials';
           // echo'<script>alert("Login Failed. Invalid Credentials")</script>';
        }
    }
    else
    {
        $message = 'Invalid Credentials';
        //echo'<script>alert("Login Failed. Invalid Credentials")</script>';
    }




}
}


?>

    <!-- START: Main Content-->
    <div class="container">
        <div class="row vh-100 justify-content-between align-items-center">
            <div class="col-12">

                <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  class="row row-eq-height lockscreen  mt-5 mb-5">
                    <div class="lock-image col-12 col-sm-5"></div>
                    <div class="login-form col-12 col-sm-7">
                        <div class="form-group mb-3">
                            <label for="user_name">Username</label>
                            <input class="form-control" type="text" id="user_name" name="user_name" required="" placeholder="Enter your Username" value="<?php if(isset($_COOKIE["user_name"])) { echo $_COOKIE["user_name"]; } ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="user_password">Password</label>
                            <input class="form-control" name="user_password" type="password" required="" id="user_password" placeholder="Enter your password" value="<?php if(isset($_COOKIE["user_password"])) { echo $_COOKIE["user_password"]; } ?>">
                        </div>
                        <?php if(isset($message)) { ?>
                        <div class="form-group mb-3">
                            <div class=" alert alert-danger  alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php  echo'<strong>Login Failed! </strong>'.' '. $message;  ?>
                              </div>
                        </div>
                    <?php } ?>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember_password" class="custom-control-input" id="checkbox-signin" <?php if(isset($_COOKIE["user_name"])) { ?> checked <?php } ?>>
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-primary" type="submit" name="login" id="login"> Log In </button>
                        </div>

                        <div class="mt-2">Forget Password? <a href="forget.php">Recover</a></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END: Content-->
    <?php include 'includes/footer2.php';?>
