<?php session_start(); include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 
//
if (isset($_GET['action'])) 
{
	if ($_GET['action']=="add_wishlist") 
	{
		if(isset($_SESSION['user_id']))
		{
			$user_id = $_SESSION['user_id'];
			$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
			echo add_to_wishlist($product_id,$user_id);
		}
		else
		{
			echo json_encode(array("statusCode"=>202));
		}

		
	}
	else if ($_GET['action']=="delete_wishlist") 
	{
			$user_id = $_SESSION['user_id'];
			$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
			$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
			echo delete_wishlist($product_id,$user_id);
	}
	else if ($_GET['action']=="show_wishlist") 
	{
		if(isset($_SESSION['user_id']))
		{
			$user_id = $_SESSION['user_id'];
			echo show_wishlist($user_id);
		}
		
	}
	else
	{

	}
}


 ?>