<?php /*session_start();*/ include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 
if (isset($_GET['action'])) {
	/*if($_GET['action']=='update_account')
	{*/
	   $username = $_SESSION['user_name'];
	   $email = mysqli_real_escape_string($conn, $_POST['email']);
	   $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
	   $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
	   $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
	   $query = "SELECT * FROM `admin` WHERE user_name='$username'";
	   $result = mysqli_query($conn, $query);
	   if (mysqli_num_rows($result) > 0)
	   {
	        $row = mysqli_fetch_assoc($result);
	        if(password_verify($current_password, $row['user_password']))
	        {
	            
	                $options = ['cost'=>11];
	                $new_password = password_hash($new_password, PASSWORD_BCRYPT,$options);
	                $query = "UPDATE `admin` SET user_password = '$new_password',user_email='$email' WHERE user_name = '$username'; ";
	                if (mysqli_query($conn, $query)) 
	                {
	                    echo json_encode(array("statusCode"=>200));

	                }

	        }
	        else
	        {
	            echo json_encode(array("statusCode"=>201));
	        }
	   }
	   else
	   {
	        echo json_encode(array("statusCode"=>202));

	   }
	   

/*	}*/

}



 ?>