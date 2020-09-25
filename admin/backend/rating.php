<?php session_start(); include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 
//
if (isset($_GET['action'])) 
{
	if ($_GET['action']=="add_rating") 
	{
		$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
		$quality = mysqli_real_escape_string($conn, $_POST['quality']);
		$value = mysqli_real_escape_string($conn, $_POST['value']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$date = date("Y/m/d");
		$query= "INSERT INTO ratings VALUES ('', '$product_id', '$quality','$value','$price','$date')";
		if(mysqli_query($conn, $query))
		{  
			echo json_encode(array("statusCode"=>200));
		}
		else
		{
			echo "Error: " . $query ."
			" . mysqli_error($conn);

		}	
	}

}


 ?>