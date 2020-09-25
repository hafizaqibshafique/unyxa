<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
<?php include 'includes/header2.php';?>
<?php
if (isset($_GET['token']))
{
	$token = mysqli_real_escape_string($conn,$_GET['token']);
	$query = "SELECT * FROM `admin` WHERE token='$token';";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) < 1)
	{
		echo("<script>window.location = 'login.php';</script>");
	}
	
}
else
{
	echo("<script>window.location = 'login.php';</script>");
}
if (isset($_POST['update_password']))
{
	$password = mysqli_real_escape_string($conn,$_POST['new_password']);
	$confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
	if ($password!=$confirm_password) {
		$msg = '<div class=" alert alert-danger  alert-dismissible fade show">
		                <button type="button" class="close" data-dismiss="alert">&times;</button>
		                    <strong>Password Error! </strong>Passwords didn`t matched.
		            </div>';
		
	}
	else
	{
		$options = ['cost'=>11];
		$password = password_hash($password, PASSWORD_BCRYPT,$options);
		$query = "UPDATE `admin` SET user_password = '$password' WHERE token = '$token'; ";
		if (mysqli_query($conn, $query))
		{
			$msg = '<div class=" alert alert-success alert-dismissible fade show">
			                <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <strong>Updated! </strong>Password Updated Successfully. Please Login
			            </div>';

		}
	}
}





 ?>
<!--Section: Block Content-->

<div class="container">
           <div class="row vh-100 justify-content-between align-items-center">
               <div class="col-12">
                   <form method="post" class="row row-eq-height lockscreen   mt-5 mb-5">
                       <!-- <div class="lock-image col-12 col-sm-5"></div> -->
                       <div class="login-form col-12 col-sm-12">
                       	<h4 class="card-title text text-primary "><b>Unyxa Password Reset</b></h4>
                           <div class="form-group mb-3">
                               <label for="new_password">New Password</label>
                               <div class="input-group">
                               	<input class="form-control psw" type="password" id="new_password" name="new_password" required="" placeholder="Enter new password">
                               <!-- 	<button type="button" id="show_password" class="btn btn-default pw">
                               	  <span class="fa fa-eye fa-lg eye " aria-hidden="true"></span> 
                               	</button> -->
                               	<h3 class="text-secondary"><span toggle=".psw" class="fa fa-eye fa-lg eye toggle-password"></span></h3>
                               	
                               </div>
                               
                           </div>
                           
                           <div class="form-group mb-3">
                               <label for="confirm_password">Confirm Password</label>
                               <div class="input-group">
                               	<input class="form-control psw" type="password" id="confirm_password" name="confirm_password" required="" placeholder="Enter new password">
                               	<h3 class="text-secondary"><span toggle=".psw" class="fa fa-eye fa-lg eye toggle-password"></span></h3> 	
                               </div>
                           </div>
                           <?php if (isset($msg)) {echo $msg;} ?>
                           <div class="form-group mb-0">
                               <button class="btn btn-primary" type="submit" name="update_password">Update Password </button>
                           </div>
                          
                           <div class="mt-2">Remeber Password? <a href="login.php">Login</a></div>
                       </div>
                   </form>
               </div>

           </div>
       </div>


       <!-- END: Content-->
<?php include 'includes/footer2.php';?>
