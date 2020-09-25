<?php include 'includes/header.php';?>
<?php 
if (isset($_POST['login'])) 
{


    if(isset($_POST['user_email']) && isset($_POST['user_password']))
    {
     $email = mysqli_real_escape_string($conn,$_POST['user_email']) ;
     $password = mysqli_real_escape_string($conn,$_POST['user_password']);
     $query = "SELECT * FROM `users` WHERE user_email='$email';";
     $result = mysqli_query($conn, $query);
     if (mysqli_num_rows($result) > 0) 
     {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['user_password']))
        {
            $_SESSION["user_id"]=$row['user_id'];
            $_SESSION["user_email"]=$row['user_email'];
            $message = 'Login Successfull';
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



?>




<!--start-single-heading-banner-->
<div class="single-banner-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">
                <div class="single-ban-top-content">
                    <p>Login</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-single-heading-banner-->
<!--start-single-heading-->
<div class="signle-heading login-m">
    <div class="container">
        <div class="row">
            <!--start-shop-head -->
            <div class="col-lg-12">
                <div class="shop-head-menu">
                    <ul>
                        <li><i class="fa fa-home"></i><a class="shop-home" href="index-2.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                        <li class="shop-pro">Login</li>
                    </ul>
                </div>
            </div>
            <!--end-shop-head-->
        </div>
    </div>
</div>
<!--end-single-heading-->
<!-- login-area start -->
<div class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                <div class="login-content banner-r-b">
                    <h2 class="login-title">Login</h2>
                    <p>Hello , Welcome to your account</p>
                    <form method="post"  >
                        <?php if(isset($message)) { ?>
                            <div class="form-group mb-3">
                                <div class=" alert alert-danger  alert-dismissible ">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <?php  echo'<strong>Login Failed! </strong>'.' '. $message;  ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group mb-3">
                            <label for="user_email">Email Address</label>
                            <input class="form-control" type="email" id="user_email" name="user_email" required="" placeholder="Enter your Email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="user_password">Password</label>
                            <input class="form-control" name="user_password" type="password" required="" id="user_password" placeholder="Enter your password">
                        </div>
                        <div class="login-lost">
                            <span class="forgot-login">
                                <a href="register.php">Register Yourself By Clicking Here!</a>
                                <br>
                                <a href="forget.php">Forgot your password?</a>
                            </span>

                        </div>

                        <input class="login-sub float-right" type="submit" name="login" value="Sign In" />
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- login-area end -->

<?php include 'includes/footer.php';?>