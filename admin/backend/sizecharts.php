<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 

function show_charts($sql)
{

	global $conn;
	$query = $sql;
	$result = mysqli_query($conn, $query);
	$show = '';
	while($row = mysqli_fetch_assoc($result))
	{
		
		$show .= ' <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="single-product shop-mar-bottom">

		<div class="product-img-wrap">
		<a class="product-img" href="#" onclick="quickview_chart('.$row['chart_id'].')" data-toggle="modal" data-target="#productModal" > <img src="./admin/images/charts_categories/'.$row['chart_picture'].'" alt="'.$row['chart_title'].'" /></a>

		<div class="add-to-cart">
		<a onclick="quickview_chart('.$row['chart_id'].')" data-toggle="modal" data-target="#productModal" href="#">
		    <div><i class="fa fa-eye"></i><span>Quick view</span></div>
		</div>
		</div>
		<div class="product-info text-center">
		<div class="product-content">
		<a href="#" onclick="quickview_chart('.$row['chart_id'].')" data-toggle="modal" data-target="#productModal"><h3 class="pro-name">'.$row['chart_title'].'</h3></a>
		</div>
		</div>
		</div>
		</div>';


	} 
	return $show;
	
}

if (isset($_GET['action'])) 
{
	if ($_GET['action']=="show_category_charts") 
	{
		$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
		$sql = "SELECT * FROM `charts` WHERE `charts`.id='$category_id'";
			echo show_charts($sql);	
	}
	else if ($_GET['action']=="show_all_charts") 
	{
		$sql = "SELECT * FROM `charts`";
			echo show_charts($sql);	
	}
	else if ($_GET['action']=="quickview_chart") 
	{
		$chart_id = mysqli_real_escape_string($conn, $_POST['chart_id']);
		echo quickview_chart($chart_id);
	}
}



  ?>