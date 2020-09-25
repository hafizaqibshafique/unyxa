<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 

if (isset($_GET['main_category'])) 
{
    $main_category_id = $_POST['main_category_id'];
    desired_sub_categories($main_category_id);
}
if (isset($_GET['product_category'])) 
{
     $product_id = $_POST['product_id'];
      product_details($product_id);
    
}
/*Chart Categories*/
if (isset($_GET['size_chart'])) 
{
      $chart_id = $_POST['size_chart_id'];
      chart_details($chart_id);
    
}
if (isset($_GET['main_category_id'])) 
{
	$main_category_id = $_POST['main_category_id'];
	featured_products($main_category_id);    
}
if (isset($_GET['featured_products'])) 
{
	$main_category_id = 6; 
	featured_products($main_category_id);   
}



 ?>