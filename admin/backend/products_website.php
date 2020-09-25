<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 
if (isset($_GET['action'])) 
{
	if ($_GET['action']=="show_main_category_products_grid") 
	{
		$main_category_id = mysqli_real_escape_string($conn, $_POST['main_category_id']);
		$sql = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id WHERE `products`.main_category_id='$main_category_id' GROUP BY `products`.product_id";
			echo show_grid_products($sql);	
	}
	else if ($_GET['action']=="show_main_category_products_list") 
	{
		$main_category_id = mysqli_real_escape_string($conn, $_POST['main_category_id']);
		$sql = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id WHERE `products`.main_category_id='$main_category_id' GROUP BY `products`.product_id";
		echo show_list_products($sql);
	}
	else if ($_GET['action']=="show_sub_category_products_grid") 
	{
		$sub_category_id = mysqli_real_escape_string($conn, $_POST['sub_category_id']);
		$sql = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id WHERE `products`.sub_category_id='$sub_category_id' GROUP BY `products`.product_id";
		echo show_grid_products($sql);
	}
	else if ($_GET['action']=="show_sub_category_products_list") 
	{
		$sub_category_id = mysqli_real_escape_string($conn, $_POST['sub_category_id']);
		$sql = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id WHERE `products`.sub_category_id='$sub_category_id' GROUP BY `products`.product_id";
		echo show_list_products($sql);
	}
	else if ($_GET['action']=="show_all_products_grid") 
	{
		$sql = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id  GROUP BY `products`.product_id";
		echo show_grid_products($sql);
	}
	else if ($_GET['action']=="show_all_products_list") 
	{
		$sql = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id  GROUP BY `products`.product_id";
		echo show_list_products($sql);
	}
	else if ($_GET['action']=="quickview_product") 
	{
		$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
		echo quickview_product($product_id);
	}
	
	else
	{
		$sql = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id  GROUP BY `products`.product_id ";
		echo show_list_products($sql);

	}
}




 ?>