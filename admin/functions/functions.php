
<?php 
function show_main_categories()
{
	global $conn;
	$query = "SELECT * FROM main_categories";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<tr>

		<td >'.$row['main_category_id'].'</td> 
		<td >'.$row['main_category_name'].'</td> 
		<td><form method="post"><input type="hidden" name="main_category_id" value="'.$row['main_category_id'].'"><button class="btn btn-primary" type="submit" name="delete_category" >Delete</button></form></td> 
		
		</tr>';
	} 

}
function categories_count ( )
{
	global $conn;
	$query = "SELECT `main_categories`.main_category_name,`main_categories`.main_category_id, COUNT( `products`.main_category_id) AS count FROM products JOIN main_categories ON `products`.main_category_id=`main_categories`.main_category_id GROUP BY `main_categories`.main_category_name Order BY Count(DISTINCT `main_categories`.main_category_name) ASC ";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$output[] = $row;
	}
	return $output;

}
function show_chart_categories_count()
{
	global $conn;
	$query = "SELECT `size_chart_categories`.category_title,`size_chart_categories`.id, COUNT( `charts`.id) AS count FROM charts JOIN size_chart_categories ON `charts`.id=`size_chart_categories`.id GROUP BY `size_chart_categories`.category_title Order BY Count(DISTINCT `size_chart_categories`.category_title) ASC ";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$output[] = $row;
	}
	return $output;
}
function sub_categories_count ( )
{
	global $conn;
	$query = "SELECT `sub_categories`.sub_category_name,`sub_categories`.sub_category_id, COUNT( `products`.sub_category_id) AS count FROM products JOIN sub_categories ON `products`.sub_category_id=`sub_categories`.sub_category_id GROUP BY `sub_categories`.sub_category_name Order BY Count(DISTINCT `sub_categories`.sub_category_name) ASC ";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$output[] = $row;
	}
	return $output;

}
function show_navbar_products()
{
	global $conn;
	$main_categories = "SELECT * FROM main_categories";
	$categories_result = mysqli_query($conn, $main_categories);
	while($rows = mysqli_fetch_assoc($categories_result))
	{
		$main_category_id = $rows['main_category_id'];
		$main_category_name = $rows['main_category_name'];
		echo $show_main_categories = '
		<span class="mega-single">
		<a href="shop-grid.php?main_category_id='.$main_category_id.'" class="mega-title">'.$main_category_name.'</a>';
		$products = "SELECT * FROM sub_categories WHERE main_category_id = '$main_category_id' ";
		$result = mysqli_query($conn, $products);
		while($row = mysqli_fetch_assoc($result))
		{
			echo $products = '<a id="'.$row['sub_category_id'].'" class="mega-description" href="shop-grid.php?sub_category_id='.$row['sub_category_id'].'">'.$row['sub_category_name'].'</a>';
		}
		echo $show = '</span>';

	} 

}
function show_mobile_view_products()
{
	global $conn;
	$main_categories = "SELECT * FROM main_categories";
	$categories_result = mysqli_query($conn, $main_categories);
	while($rows = mysqli_fetch_assoc($categories_result))
	{
		$main_category_id = $rows['main_category_id'];
		$main_category_name = $rows['main_category_name'];
		echo $show_main_categories = '
		<li><a href="shop-grid.php?main_category_id='.$main_category_id.'">'.$main_category_name.'</a><ul>';
		$products = "SELECT * FROM sub_categories WHERE main_category_id = '$main_category_id' ";
		$result = mysqli_query($conn, $products);
		while($row = mysqli_fetch_assoc($result))
		{
			echo $products = '
			<li><a href="shop-grid.php?sub_category_id='.$row['sub_category_id'].'">'.$row['sub_category_name'].'</a></li>';
		}
		echo $show = '</ul>';

	} 

}
function show_main_categories_index()
{
	global $conn;
	$query = "SELECT * FROM main_categories ORDER BY main_category_id ASC LIMIT 5";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<li role="presentation" id="'.$row['main_category_id'].'"><a class="main_categories" id="'.$row['main_category_id'].'" href="#featured_products" aria-controls="featured_products" role="tab" data-toggle="tab">'.$row['main_category_name'].'</a></li>';
	} 

}
function query_time_ago($date)  
{  
	date_default_timezone_set("Asia/Karachi");
	$time_ago = strtotime($date); 
	$current_time = time();
	$time_difference = $current_time - $time_ago; 
	$seconds = $time_difference; 
     $minutes = round($seconds / 60 );           // value 60 is seconds  
     $hours = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
     $days = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
     $weeks  = round($seconds / 604800);          // 7*24*60*60;  
     $months = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
     $years  = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
     if($seconds <= 60)  
     {  
     	return "Just Now";  
     }  
     else if($minutes <=60)  
     {  
     	if($minutes==1)  
     	{  
     		return "1 minute ago";  
     	}  
     	else  
     	{  
     		return "$minutes minutes ago";  
     	}  
     }  
     else if($hours <=24)  
     {  
     	if($hours==1)  
     	{  
     		return "an hour ago";  
     	}  
     	else  
     	{  
     		return "$hours hrs ago";  
     	}  
     }  
     else if($days <= 7)  
     {  
     	if($days==1)  
     	{  
     		return "yesterday";  
     	}  
     	else  
     	{  
     		return "$days days ago";  
     	}  
     }  
     else if($weeks <= 4.3) //4.3 == 52/12  
     {  
     	if($weeks==1)  
     	{  
     		return "a week ago";  
     	}  
     	else  
     	{  
     		return "$weeks weeks ago";  
     	}  
     }  
     else if($months <=12)  
     {  
     	if($months==1)  
     	{  
     		return "a month ago";  
     	}  
     	else  
     	{  
     		return "$months months ago";  
     	}  
     }  
     else  
     {  
     	if($years==1)  
     	{  
     		return "one year ago";  
     	}  
     	else  
     	{  
     		return "$years years ago";  
     	}  
     }  
 } 
 function show_unread_queries()
 {
 	global $conn;
 	$query = "SELECT * FROM query WHERE query_status = 'unread' ORDER BY query_id DESC LIMIT 4";
 	$result = mysqli_query($conn, $query); 
 	while($row = mysqli_fetch_assoc($result))
 	{
 		$date = $row['date'];
 		$query_time = query_time_ago($date);
 		echo $show = '<li >
 		<a class="dropdown-item px-2 py-2 aqib border border-top-0 border-left-0 border-right-0" href="app-mail.php">
 		<div class="media" style="width: 200px">
 		<img src="dist/images/author.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle w-50">
 		<div class="media-body">
 		<p class="mb-0 text-success">'.$row['user_name'].'</p>
 		<p class="mb-0 text-primary">New message</p>
 		<p class="mb-0 ">'.$row['query_type'].'</p>
 		'.$query_time.'
 		</div>
 		</div>
 		</a>
 		</li>';
 	} 
 	echo $show = '<li><a class="dropdown-item text-center py-2" href="app-mail.php"> Read All Message <i class="icon-arrow-right pl-2 small"></i></a></li>';

 }
 function show_all_queries()
 {
 	global $conn;
 	$query = "SELECT * FROM query ORDER BY query_status DESC";
 	$result = mysqli_query($conn, $query); 
 	while($row = mysqli_fetch_assoc($result))
 	{
 		$time = date('h:i a', strtotime($row['date']));
 		$date = date('Y/m/d', strtotime($row['date']));
 		$time = date('h:i a', strtotime($row['date']));
 		if ($date==date("Y/m/d")) {
 			$date='Today';
 		}
 		else
 		{
 			$date = date('D d M Y', strtotime($row['date']));
 		}
 		echo $show = '<li class="py-3 px-2 mail-item inbox unread personal-mail starred important">
 		<div class="d-flex align-self-center align-middle">
 		<label class="chkbox">
 		<input type="checkbox" >
 		<span class="checkmark small"></span>
 		</label>
 		<div class="mail-content d-md-flex w-100">
 		<span class="mail-type-icon">
 		<i class="icon-star mr-1"></i> 
 		<i class="icon-exclamation mr-2"></i>
 		</span>
 		<span  class="mail-name">'.$row['user_name'].'</span> 
 		<p id="'.$row['query_id'].'" class="mail-subject">'.$row['query_type'].'</p>                                               
 		<div class="d-flex mt-3 mt-md-0 ml-auto">
 		<div class="pill-link"> <i class="icon-link mr-3"></i> </div>
 		<div class="ml-md-auto mr-3 dot primary"></div>
 		<p class="ml-auto mail-date mb-0">'.$date.' at '.$time.'</p>
 		<a href="#" class="ml-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical"></i></a>
 		<div class="dropdown-menu p-0 m-0 dropdown-menu-right">
 		<a id="'.$row['query_id'].'"  class="dropdown-item single-read" href="#" ><i class="icon-book-open"></i> Mark as Read</a>
 		<a id="'.$row['query_id'].'"  class="dropdown-item single-unread" href="#"><i class="icon-notebook"></i> Mark as unread</a>
 		<a id="'.$row['query_id'].'"  class="dropdown-item single-delete" href="#"><i class="icon-trash"></i> Delete</a>                                       
 		</div>
 		</div>
 		</div>
 		</div>
 		</li>';
 	} 


 }
 function selected_query_details()
 {
 	global $conn;
 	$query = "SELECT * FROM query ORDER BY query_status DESC WHERE query_id = '$query_id'";
 	$result = mysqli_query($conn, $query);
 	while ($rows = mysqli_fetch_array($result)) {
 		$row[] = $rows;
 	}
 	return $row;

 }
 function show_queries_details()
 {
 	global $conn;
 	$query = "SELECT * FROM query ORDER BY query_status DESC";
 	$result = mysqli_query($conn, $query); 
 	while($row = mysqli_fetch_assoc($result))
 	{
 		$date = date('Y/m/d', strtotime($row['date']));
 		$time = date('h:i a', strtotime($row['date']));
 		if ($date==date("Y/m/d")) {
 			$date='Today';
 		}
 		else
 		{
 			$date = date('D d M Y', strtotime($row['date']));
 		}

 		echo $show = '<div class="view-email" id="'.$row['query_id'].'">
 		<div class="card-body">
 		<a href="#" class="bg-primary float-left mr-3  py-1 px-2 rounded text-white back-to-email" id="'.$row['query_id'].'" >
 		Back
 		</a>
 		<h5 class=" mb-3">'.$row['query_type'].'t</h5>
 		<div class="media mb-5 mt-5">
 		<div class="align-self-center">
 		<img src="dist/images/author1.jpg" alt="" class="img-fluid rounded-circle d-flex mr-3" width="40">
 		</div>
 		<div class="media-body">
 		<h6 class="mb-0 view-author">'.$row['user_name'].'</h6>  
 		<small class="view-date">'.$date.' at '.$time.'</small>
 		</div>
 		</div>
 		<p>'.$row['query_detail'].'</p>
 		<div class="eagle-divider my-3"></div>
 		<div class="row megnify-popup">
 		</div>
 		</div>
 		</div>';
 	} 


 }

 function show_chart_categories()
 {
 	global $conn;
 	echo  $query = "SELECT * FROM size_chart_categories";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<tr>

 		<td >'.$row['id'].'</td> 
 		<td >'.$row['category_title'].'</td> 
 		<td><form method="post"><input type="hidden" name="main_category_id" value="'.$row['id'].'"><button class="btn btn-primary" type="submit" name="delete_category" >Delete</button></form></td> 

 		</tr>';
 	} 

 }
 function show_sub_categories()
 {
 	global $conn;
 	$query = "SELECT * FROM `sub_categories` JOIN main_categories ON `sub_categories`.main_category_id=`main_categories`.main_category_id";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<tr>

 		<td >'.$row['sub_category_id'].'</td> 
 		<td >'.$row['sub_category_name'].'</td> 
 		<td >'.$row['main_category_name'].'</td> 
 		<td><form method="post"><input type="hidden" name="sub_category_id" value="'.$row['sub_category_id'].'"><button class="btn btn-primary" type="submit" name="delete_sub_category" >Delete</button></form></td> 

 		</tr>';
 	} 

 }
 function show_size_charts()
 {
 	global $conn;
 	$query = "SELECT * FROM `charts` JOIN size_chart_categories ON `charts`.id=`size_chart_categories`.id";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<tr>

 		<td >'.$row['id'].'</td> 
 		<td >'.$row['category_title'].'</td> 
 		<td >'.$row['chart_id'].'</td> 
 		<td >'.$row['chart_title'].'</td> 
 		<td><form method="post"><input type="hidden" name="chart_id" value="'.$row['chart_id'].'"><input type="hidden" name="chart_picture" value="'.$row['chart_picture'].'"><button class="btn btn-primary" type="submit" name="submit" >Delete</button></form></td> 

 		</tr>';
 	} 

 }
 function show_gallery()
 {
 	global $conn;
 	$query = "SELECT * FROM `gallery`";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<tr>

 		<td >'.$row['gallery_id'].'</td> 
 		<td ><img style="display:block;" width="200"   src="./images/gallery/'.$row['gallery_picture'].'" class="testimonial-img" alt="'.$row['gallery_title'].'"></td> 
 		<td >'.$row['gallery_title'].'</td> 
 		<td >'.$row['gallery_description'].'</td> 
 		<td><form method="post"><input type="hidden" name="gallery_id" value="'.$row['gallery_id'].'"><input type="hidden" name="gallery_picture" value="'.$row['gallery_picture'].'"><button class="btn btn-primary" type="submit" name="submit" >Delete</button></form></td> 

 		</tr>';
 	} 

 }

 function show_certificates()
 {
 	global $conn;
 	$query = "SELECT * FROM `certificates`";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<tr >

 		<td>'.$row['certificate_id'].'</td> 
 		<td ><img style="display:block;" width="300" height="100"  src="./images/certificates/'.$row['certificate_picture'].'" class="testimonial-img" alt="'.$row['certificate_picture'].'"></td> 
 		<td >'.$row['certificate_title'].'</td> 
 		<td><form  method="post"><input type="hidden" name="certificate_id" value="'.$row['certificate_id'].'"><input type="hidden" name="certificate_picture" value="'.$row['certificate_picture'].'"><button class="btn btn-primary" type="submit" name="delete_certificate" >Delete</button></form></td> 
 		</tr>';
 	} 

 }
 function show_testimonials()
 {
 	global $conn;
 	$query = "SELECT * FROM `testimonials`";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<tr >

 		<td>'.$row['testimonial_id'].'</td> 
 		<td ><img style="display:block;" width="300" height="100"  src="./images/testimonials/'.$row['testimonial_picture'].'" class="testimonial-img" alt="'.$row['testimonial_title'].'"></td> 
 		<td >'.$row['testimonial_title'].'</td> 
 		<td >'.$row['testimonial_description'].'</td> 
 		<td><form  method="post"><input type="hidden" name="testimonial_id" value="'.$row['testimonial_id'].'"><input type="hidden" name="testimonial_picture" value="'.$row['testimonial_picture'].'"><button class="btn btn-primary" type="submit" name="delete_testimonial" >Delete</button></form></td> 
 		</tr>';
 	} 

 }
 function show_services()
 {
 	global $conn;
 	$query = "SELECT * FROM `services`";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<tr >

 		<td>'.$row['service_id'].'</td> 
 		<td ><img style="display:block;" width="300" height="100"  src="./images/services/'.$row['service_picture'].'" class="testimonial-img" alt="'.$row['service_title'].'"></td> 
 		<td >'.$row['service_title'].'</td> 
 		<td >'.$row['service_description'].'</td> 
 		<td><form  method="post"><input type="hidden" name="service_id" value="'.$row['service_id'].'"><input type="hidden" name="service_picture" value="'.$row['service_picture'].'"><button class="btn btn-primary" type="submit" name="delete_service" >Delete</button></form></td> 
 		</tr>';
 	} 

 }
 function services_pictures()
 {
 	global $conn;
 	$query = "SELECT * FROM `services`";
 	$result = mysqli_query($conn, $query);
 	while($rows = mysqli_fetch_assoc($result))
 	{
 		$row[] = $rows;
 	}
 	return $row; 

 }
 function services_details($service_id)
 {
 	global $conn;
 	$query = "SELECT * FROM `services` WHERE service_id = '$service_id'";
 	$result = mysqli_query($conn, $query);
 	if (mysqli_num_rows($result) > 0)
 	{
 		while($rows = mysqli_fetch_assoc($result))
 		{
 			$row[] = $rows;
 		}
 	}
 	else
 	{
 		$row = false;
 	}

 	return $row; 

 }
 function load_certificates()
 {
 	global $conn;
 	$query = "SELECT * FROM certificates";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['certificate_id'].'|'.$row['certificate_picture'].'">'.$row["certificate_title"].'</option>';
 	}
 }
 function load_galleries()
 {
 	global $conn;
 	$query = "SELECT * FROM gallery";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['gallery_id'].'|'.$row['gallery_picture'].'">'.$row['gallery_id'].' - '.$row["gallery_title"].'</option><hr>';
 	} 

 }
 function load_testimonials()
 {
 	global $conn;
 	$query = "SELECT * FROM testimonials";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['testimonial_id'].'|'.$row['testimonial_picture'].'">'.$row['testimonial_id'].' - '.$row["testimonial_title"].'</option>';
 	} 

 }
 function load_services()
 {
 	global $conn;
 	$query = "SELECT * FROM services";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['service_id'].'|'.$row['service_picture'].'">'.$row['service_id'].' - '.$row["service_title"].'</option>';
 	} 

 }
 function load_main_categories()
 {
 	global $conn;
 	$query = "SELECT * FROM main_categories";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['main_category_id'].'">'.$row["main_category_name"].'</option>';
 	} 

 }
 function load_chart_categories()
 { 
 	global $conn;
 	$query = "SELECT * FROM size_chart_categories";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['id'].'">'.$row["category_title"].'</option>';
 	}
 }
 function load_charts()
 {
 	global $conn;
 	$categories_query = "SELECT * FROM size_chart_categories";
 	$categories_result = mysqli_query($conn, $categories_query);
 	while($row = mysqli_fetch_assoc($categories_result))
 	{
 		$category_id = $row['id'];
 		echo $categories = '<optgroup label="'.$row['category_title'].'">';
 		$query = "SELECT * FROM charts WHERE id = '$category_id'";
 		$result = mysqli_query($conn, $query);
 		while($row = mysqli_fetch_assoc($result))
 		{
 			echo $products = '<option value="'.$row['chart_id'].'|'.$row['chart_picture'].'">'.$row['chart_id'].' - '.$row['chart_title'].'</option>';
 		}
 		echo $categories = '</optgroup>';


 	}

 }
 function load_sub_categories()
 {
 	global $conn;
 	$query = "SELECT * FROM sub_categories";
 	$result = mysqli_query($conn, $query);
 	echo $show = '<option value="" selected >Choose...</option>';
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['sub_category_id'].'">'.$row["sub_category_name"].'</option>';
 	} 

 }
//For Ajax Change category
 function desired_sub_categories($main_category_id)
 {
 	global $conn;
 	$query = "SELECT * FROM sub_categories WHERE main_category_id= '$main_category_id'";
 	$result = mysqli_query($conn, $query);
 	while($row = mysqli_fetch_assoc($result))
 	{
 		echo $show = '<option value="'.$row['sub_category_id'].'">'.$row["sub_category_name"].'</option>';
 	} 

 }
/*function desired_size_charts($chart_category_id)
{
	global $conn;
	$query = "SELECT * FROM charts WHERE id= '$chart_category_id'";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
	 echo $show = '<option value="'.$row['chart_id'].'">'.$row["chart_title"].'</option>';
 } 

}*/
function load_products()
{
	global $conn;
	$categories_query = "SELECT * FROM main_categories";
	$categories_result = mysqli_query($conn, $categories_query);
	while($row = mysqli_fetch_assoc($categories_result))
	{
		$category_name = $row['main_category_id'];
		echo $categories = '<optgroup label="'.$row['main_category_name'].'">';
		$query = "SELECT * FROM products WHERE main_category_id = '$category_name'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result))
		{
			echo $products = '<option value="'.$row['product_id'].'">'.$row['product_code'].' - '.$row['product_title'].'</option>';
		}
		echo $categories = '</optgroup>';


	} 

}
//Load Selected Product Details
function product_details($product_id)
{
	global $conn;
	$query = "SELECT * FROM products WHERE product_id= '$product_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	return json_encode($row); 
	
}
function new_arrivals()
{
	global $conn;
	$query = "SELECT * FROM `products` JOIN products_images ON `products`.`product_id`=`products_images`.`product_id` WHERE `products`.`product_new_tag`='new' GROUP BY `products`.`product_id` DESC  LIMIT 10";
	$result = mysqli_query($conn, $query);
	while ($rows = mysqli_fetch_array($result)) {
		$row[] = $rows;
	}
	return $row;
	
}
function random_products()
{
	global $conn;
	$query = "SELECT * FROM `products` JOIN products_images ON `products`.`product_id`=`products_images`.`product_id` WHERE `products`.`product_new_tag`='new' GROUP BY `products`.`product_id` ORDER BY RAND() Limit 10";
	$result = mysqli_query($conn, $query);
	while ($rows = mysqli_fetch_array($result)) {
		$row[] = $rows;
	}
	return $row;
	
}
function latest_testimonials()
{
	global $conn;
	$query = "SELECT * FROM `testimonials` ORDER BY RAND() ";
	$result = mysqli_query($conn, $query);
	while ($rows = mysqli_fetch_array($result)) {
		$row[] = $rows;
	}
	return $row;
	
}

/*Load Selected Chart Details*/
function chart_details($chart_id)
{
	global $conn;
	$query = "SELECT * FROM charts WHERE chart_id= '$chart_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row); 
	
}
function gallery_details($gallery_id)
{
	global $conn;
	$query = "SELECT * FROM gallery WHERE gallery_id= '$gallery_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row); 
	
}
function testimonial_details($testimonial_id)
{
	global $conn;
	$query = "SELECT * FROM testimonials WHERE testimonial_id= '$testimonial_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row); 
	
}
function service_details($service_id)
{
	global $conn;
	$query = "SELECT * FROM services WHERE service_id= '$service_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row); 
	
}
function product_images($product_id)
{
	global $conn;
	$query = "SELECT * FROM products_images WHERE product_id= '$product_id'";
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		$output[] = $row;
	}
	return $output;

}
function show_all_products()
{
	global $conn;
	$query = "SELECT * FROM `products` JOIN sub_categories ON `products`.`sub_category_id`=`sub_categories`.sub_category_id JOIN `main_categories` ON `sub_categories`.`main_category_id`=`main_categories`.`main_category_id`";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<tr>

		<td >'.$row['product_code'].'</td> 
		<td >'.$row['product_title'].'</td> 
		<td >'.$row['product_old_price'].'</td> 
		<td >'.$row['product_new_price'].'</td> 
		<td >'.$row['product_status'].'</td> 
		<td >'.$row['product_sale_tag'].'</td> 
		<td >'.$row['product_new_tag'].'</td> 
		<td >'.$row['main_category_name'].'</td> 
		<td >'.$row['sub_category_name'].'</td>
		<td><form method="post"><input type="hidden" name="product_id" value="'.$row['product_id'].'"><button class="btn btn-primary" type="submit" name="delete_product" >Delete</button></form></td> 
		
		</tr>';
	} 
	
}
function show_list_products($sql)
{
	global $conn;
	$query = $sql;
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '
		<div class="single-product"><hr></div>
		<div class="single-product">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<div class="product-img-wrap">
		<a class="product-img" href="single-product.php?product_id='.$row['product_id'].'"> <img src="./admin/images/products/'.$row['product_image_title'].'" alt="'.$row['product_title'].'" /></a>
		</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<div class="product-info text-left">
		<div class="product-content shop">
		<a href="single-product.php?product_id='.$row['product_id'].'"><h3 class="pro-name">'.$row['product_title'].'</h3></a>
		<div class="pro-rating">
		<ul>
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
		<li class="r-grey"><i class="fa fa-star"></i></li>
		<li class="r-grey"><i class="fa fa-star-half-o"></i></li>
		</ul>
		</div>
		<div class="pro-price">
		<span class="price-text">Price:</span>
		<span class="normal-price">150.00</span>
		<span class="old-price"><del>$200.00</del></span>
		</div>
		</div>
		</div>
		<div class="shop-article text-left">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis laboriosam hic omnis, blanditiis nihil aliquam, dolores maxime eum et quidem ducimus nostrum adipisci culpa, delectus numquam repellendus minima deserunt iste similique nesciunt. Accusantium ipsam sed deleniti culpa necessitatibus optio sit fuga quis cumque itaque odit nihil non, officia, et sapiente.</p>
		</div>
		<div class="shop-button-area">
		<div class="add-to-cartbest shop">
		<a href="#" title="add to cart">
		<div><span>Add to cart</span></div>
		</a>
		</div>
		</div>
		<div class="add-to-link shop">
		<a title="Add to Wishlist" href="#wishlist" onclick="add_to_wishlist('.$row['product_id'].')">
		<div><i class="fa fa-heart heart-'.$row['product_id'].'"></i><span class="wishlist-text-'.$row['product_id'].'"">Add to Wishlist</span></div>
		</a>
		<a href="#">
		<div><i class="fa fa-random"></i><span>Add to compare</span></div>
		</a>
		</div>
		</div>
		</div>
		<div>.<br>.</div>

		';
	} 
	
}
function show_grid_products($sql)
{
/*	<div class="sale">Sale</div>
	<div class="sale-border"></div>
	<div class="new">new</div>*/
	global $conn;
	$query = $sql;
	$result = mysqli_query($conn, $query);
	$show = '';
	while($row = mysqli_fetch_assoc($result))
	{
		$show .= '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="single-product shop-mar-bottom">';
		if ($row['product_sale_tag']!='')
		{
			$show .= '<div class="sale">Sale</div><div class="sale-border"></div>';
		}
		if ($row['product_new_tag']!='')
		{
			$show .= '<div class="new">new</div>';
		}
		$show .= '<div class="product-img-wrap">
		<a class="product-img" href="single-product.php?product_id='.$row['product_id'].'"> <img src="./admin/images/products/'.$row['product_image_title'].'" alt="'.$row['product_title'].'" /></a>
		<div class="add-to-link">
		<a title="Add to Wishlist" href="#wishlist" onclick="add_to_wishlist('.$row['product_id'].')">
		<div><i class="fa fa-heart heart-'.$row['product_id'].'"></i><span class="wishlist-text-'.$row['product_id'].'" >Add to Wishlist</span></div>
		</a>
		<a onclick="quickview_product('.$row['product_id'].')" data-toggle="modal" data-target="#productModal" href="#">
		<div><i class="fa fa-eye"></i><span>Quick view</span></div>
		</a>
		<a href="#">
		<div><i class="fa fa-random"></i><span>Add to compare</span></div>
		</a>
		</div>
		<div class="add-to-cart">
		<a href="#" title="add to cart">
		<div><i class="fa fa-shopping-cart"></i><span>Add to cart</span></div>
		</a>
		</div>
		</div>
		<div class="product-info text-center">
		<div class="product-content">
		<a href="single-product.php?product_id='.$row['product_id'].'"><h3 class="pro-name">'.$row['product_title'].'</h3></a>
		<div class="pro-rating">
		<ul>
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
		<li class="r-grey"><i class="fa fa-star"></i></li>
		<li class="r-grey"><i class="fa fa-star-half-o"></i></li>
		</ul>
		</div>
		<div class="pro-price">
		<span class="price-text">Price:</span>
		<span class="normal-price">$'.$row['product_new_price'].'</span>
		<span class="old-price"><del>$'.$row['product_old_price'].'</del></span>
		</div>
		</div>
		</div>
		</div>
		</div>';


	} 
	return $show;
	
}
function quickview_product($product_id)
{
	global $conn;
	$query = "SELECT * FROM `products` JOIN products_images ON `products`.`product_id`=`products_images`.`product_id` WHERE `products`.`product_id`='$product_id' GROUP BY `products`.`product_id`";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<div class="modal-product">
		<!-- product-images -->
		<div class="product-images">
		<div class="main-image images">
		<img alt="'.$row['product_title'].'" src="./admin/images/products/'.$row['product_image_title'].'">
		</div>
		</div>
		<!-- product-images -->
		<!-- product-info -->
		<div class="product-info">
		<h1>'.$row['product_title'].'</h1>
		<div class="price-box-3">
		<div class="s-price-box">
		<span class="normal-price">$'.$row['product_new_price'].'</span>
		</div>
		</div>
		<a href="single-product.php?product_id='.$row['product_id'].'" class="see-all">See all features</a>
		<div class="quick-add-to-cart">
		<form method="post" class="cart">
		<div class="numbers-row">
		<input type="number" id="french-hens" value="3">
		</div>
		<button class="single_add_to_cart_button" type="submit">Add to cart</button>
		</form>
		</div>
		<div class="quick-desc">
		'.$row['product_description'].'
		</div>
		<div class="social-sharing">
		<div class="widget widget_socialsharing_widget">
		<h3 class="widget-title-modal">Share this product</h3>
		<ul class="social-icons">
		<li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
		<li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
		<li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
		<li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
		<li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
		</ul>
		</div>
		</div>
		</div>
		<!-- product-info -->
		</div>';
	} 

}
function quickview_chart($chart_id)
{
	global $conn;
	 $query = "SELECT * FROM `charts` WHERE `charts`.`chart_id`='$chart_id'";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<div class="modal-product">
		<!-- product-images -->
		<div class="product-images">
		<div class="main-image images">
		<img alt="'.$row['chart_picture'].'" src="./admin/images/charts_categories/'.$row['chart_picture'].'">
		</div>
		</div>
		<div class="product-info">
		<h1>'.$row['chart_title'].'</h1>
		<div class="quick-desc">
		'.$row['chart_description'].'
		</div>
		<div class="social-sharing">
		<div class="widget widget_socialsharing_widget">
		<h3 class="widget-title-modal">Share this product</h3>
		<ul class="social-icons">
		<li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
		<li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
		<li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
		<li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
		<li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
		</ul>
		</div>
		</div>
		</div>
		</div>';
	} 

}
function featured_products($main_category_id)
{

	global $conn;
	$query = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id WHERE main_category_id='$main_category_id' GROUP BY `products`.product_id ORDER BY `products`.product_id DESC LIMIT 4 ";
	$result = mysqli_query($conn, $query);
	/*echo $aqib = '<div class="row">
	<div class="featured-carousel indicator" >';*/
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<div class="col-lg-3"><div class="single-product">
		<div class="sale">'.$row['product_sale_tag'].'</div>
		<div class="new">'.$row['product_new_tag'].'</div>
		<div class="sale-border"></div>
		<div class="product-img-wrap">
		<a class="product-img" href="single-product.php?product_id='.$row['product_id'].'" > <img src="./admin/images/products/'.$row['product_image_title'].'" alt="'.$row['product_title'].'" /></a>
		<div class="add-to-link">
		<a  title="Add to Wishlist" href="#wishlist" onclick="add_to_wishlist('.$row['product_id'].')">
		<div><i class="fa fa-heart heart-'.$row['product_id'].'"></i><span class="wishlist-text-'.$row['product_id'].'" >Add to Wishlist</span></div>
		</a>
		<a onclick="quickview_product('.$row['product_id'].')" data-toggle="modal" data-target="#productModal" href="#">
		<div><i class="fa fa-eye"></i><span>Quick view</span></div>
		</a>
		<a href="#">
		<div><i class="fa fa-random"></i><span>Add to compare</span></div>
		</a>
		</div>
		<div class="add-to-cart">
		<a href="#" title="add to cart">
		<div><i class="fa fa-shopping-cart"></i><span>Add to cart</span></div>
		</a>
		</div>
		</div>
		<div class="product-info text-center">
		<div class="product-content">
		<a href="single-product.php?'.$row['product_id'].'"><h3 class="pro-name">'.$row['product_title'].'</h3></a>
		<div class="pro-rating">
		<ul>
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
		<li><i class="fa fa-star"></i></li>
		<li class="r-grey"><i class="fa fa-star"></i></li>
		<li class="r-grey"><i class="fa fa-star-half-o"></i></li>
		</ul>
		</div>
		<div class="pro-price">
		<span class="price-text">Price:</span>
		<span class="normal-price">$'.$row['product_old_price'].'</span>
		<span class="old-price"><del>$'.$row['product_new_price'].'</del></span>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		';
	}

	
}
function sample_product()
{

	global $conn;
	$query = "SELECT * FROM `products` JOIN products_images ON `products`.product_id=`products_images`.product_id WHERE product_sample_tag='sample' GROUP BY `products`.product_id ORDER BY `products`.product_id DESC LIMIT 1 ";
	$result = mysqli_query($conn, $query);
	/*echo $aqib = '<div class="row">
	<div class="featured-carousel indicator" >';*/
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<div class="single-product trend-pro">
						<div class="product-img-wrap">
							<a class="product-img" href="#"> <img src="./admin/images/products/'.$row['product_image_title'].'" alt="product-image" /></a>
						</div>
						<div class="product-info text-center">
							<div class="product-content">
								<a href="#"><h3 class="pro-name">'.$row['product_title'].'</h3></a>
								<div class="pro-rating">
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li class="r-grey"><i class="fa fa-star"></i></li>
										<li class="r-grey"><i class="fa fa-star-half-o"></i></li>
									</ul>
								</div>
								<div class="pro-price">
									<span class="price-text">Price:</span>
									<span class="normal-price">$'.$row['product_new_price'].'</span>
									<span class="old-price"><del>$'.$row['product_old_price'].'</del></span>
								</div>
							</div>
						</div>
						<div class="upcoming-product">

							<div id="countdown" data-countdown="2020/12/12"></div>
						</div>
					</div>
		
		';
	}

	
}
function mark_as_read($query_id)
{
	global $conn;
	$query = "UPDATE `query` SET `query_status`='read' WHERE query_id = '$query_id'";
	if(mysqli_query($conn, $query)) 
	{
		echo json_encode(array("statusCode"=>200));
	}
	else
	{
		echo json_encode(array("statusCode"=>201));
	}
}
function mark_as_unread($query_id)
{
	global $conn;
	$query = "UPDATE `query` SET `query_status`='unread' WHERE query_id = '$query_id'";
	if(mysqli_query($conn, $query)) 
	{
		echo json_encode(array("statusCode"=>200));
	}
	else
	{
		echo json_encode(array("statusCode"=>201));
	}
}
function add_to_wishlist($product_id,$user_id)
{
	global $conn;
	$query = "SELECT * FROM wishlist WHERE `wishlist`.user_id = '$user_id' AND `wishlist`.product_id = '$product_id' ";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result)>0) 
	{
		echo json_encode(array("statusCode"=>201));
		
	}
	else
	{
		$query= "INSERT INTO wishlist VALUES ('', '$user_id', '$product_id')";
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


function count_products()
{

	global $conn;
	$query = "SELECT COUNT(product_id) AS 'total_products' FROM `products`";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$total_products = $row['total_products'];
		echo $show = '<span class="h4">'.$total_products.'</span>';

	}
	else
	{
		echo $show = '<span class="h4">0</span>';
	}
	
}
function count_users()
{

	global $conn;
	$query = "SELECT COUNT(user_id) AS 'total_users' FROM `users`";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$total_users = $row['total_users'];
		echo $show = '<span class="h4">'.$total_users.'</span>';
	}
	else
	{
		echo $show = '<span class="h4">0</span>';
	}
	
}
function count_orders()
{

	global $conn;
	$query = "SELECT COUNT(order_id) AS 'total_orders' FROM `orders`";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$total_orders = $row['total_orders'];
		echo $show = '<span class="h4">'.$total_orders.'</span>';
	}
	else
	{
		echo $show = '<span class="h4">0</span>';
	}
	
}

function count_visitors()
{

	global $conn;
	$query = "SELECT COUNT(v_id) AS 'visitors_count' FROM `visitors`";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$visitors_count = $row['visitors_count'];
		echo $show = '<span class="h4">'.$visitors_count.'</span>';
	}
	else
	{
		echo $show = '<span class="h4">0</span>';
	}
	
}

function show_users()
{
	global $conn;
	$query = "SELECT * FROM users";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		$date_day = date(" d F Y", strtotime($row['date'])).' '.$row['day'];
		echo $show = '<tr>

		<td >'.$row['user_id'].'</td> 
		<td >'.$row['user_name'].'</td> 
		<td >'.$row['user_last_name'].'</td> 
		<td >'.$row['user_email'].'</td> 
		<td >'.$row['user_phone'].'</td> 
		<td >'.$row['user_address'].'</td> 
		<td >'.$row['user_city'].'</td> 
		<td >'.$row['user_country'].'</td> 
		<td >'.$date_day.'</td> 
		</tr>';
	} 

}
function show_all_orders ( )
{
	global $conn;
	/* $query = "SELECT `orders`.`order_id`,total_price,`invoice_detail`.`user_id`,`invoice_detail`.`pro_id`,`products`.`pro_name`,`products`.`pro_code`, `invoice_detail`.`pro_quantity`,`user`.`user_name`,`user`.`user_email`,`user`.`user_address` FROM orders JOIN invoice_detail ON `orders`.`order_id`=`invoice_detail`.`order_id` JOIN user ON `invoice_detail`.`user_id`=`user`.`user_id` JOIN products ON `invoice_detail`.`pro_id`=`products`.`pro_id` ORDER BY pro_id ASC ";*/

	$query = "SELECT * FROM orders join users ON `orders`.user_id=`user`.user_id ";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)) {
		$order_id=$row['order_id']; 
		$first_name=$row['user_name'];
		$total_price=$row['total_price'];
		$user_id=$row['user_id'];
		$additional_notes=$row['additional_notes'];
		$email=$row['user_email'];
		$date=$row['date'];
		$day=$row['day'];
		$address=$row['user_address'];

		echo $show = '<tr>

		<td >'.$order_id.'</td> 
		<td >'.$first_name.'</td> 
		<td >'.$email.'</td> 
		<td >'.$address.'</td> 
		<td >'.$additional_notes.'</td> 
		<td >'.$total_price.'</td> 
		<td >'.$date.' '.' '.' '.$day.'</td> 
		<td><a href="" class="btn btn-dark text-white" data-id="'.$order_id.'" data-role=view_order data-toggle="modal"  data-target="#exampleModal">View Deitals</a></td> 

		

		
		</tr>';
		
	}

}

/*Show Gallery for Website*/
function show_gallery_images()
{
	global $conn;
	$query = "SELECT gallery_id,gallery_picture FROM `gallery`";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		$gallery_id = $row['gallery_id'];
		$gallery_picture = $row['gallery_picture'];
		echo $show = '<a href="gallery-details.php?gallery_id='.$gallery_id.'"><img src="./admin/images/gallery/'.$gallery_picture.'"></a>';
	} 

}

function show_gallery_detials($gallery_id)
{
	global $conn;
	$query = "SELECT * FROM `gallery` WHERE gallery_id='$gallery_id'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) 
	{
		$gallery_id = $row['gallery_id'];
		$gallery_title = $row['gallery_title'];
		$gallery_description = $row['gallery_description'];
		$gallery_picture = $row['gallery_picture'];
		echo $show = '<div class="single-blog margin-blog">
		<div class="blog-img port-details">
		<img src="./admin/images/gallery/'.$gallery_picture.'" alt="'.$gallery_title.'">
		</div>
		<div class="blog-inner-content">
		<div class="blog-inner-text">
		<div class="blog-title">
		<h4>'.$gallery_title.'</h4>
		</div>
		</div>
		<div class="blog-pragraph">
		<p>'.$gallery_description.'</p>
		</div>
		</div>
		</div>';
	}
	else
	{
		echo $show = '<div class="single-blog margin-blog">
		<div class="blog-inner-content">
		<div class="blog-inner-text">
		<div class="blog-title">
		<h4>Gallery is Empty!</h4>
		</div>
		</div>
		</div>
		</div>';	
	}
	
}

function check_newsletter_email($newsletter_email)
{
	global $conn;
	$query = "SELECT * FROM `newsletter` WHERE newsletter_email='$newsletter_email'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	if (mysqli_num_rows($result) > 0) 
	{
		return true;	
	}
	else
	{
		return false;	
	}
	
}
function show_wishlist($user_id)
{
	global $conn;
	$query = "SELECT * FROM `wishlist` JOIN `products` ON `wishlist`.`product_id`=`products`.`product_id` JOIN `products_images` ON `products`.`product_id`=`products_images`.`product_id` WHERE user_id= '$user_id'  GROUP BY `wishlist`.`product_id`";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_array($result)) {
			echo $output = ' <tr>
			<td class="product-remove"><a href="#" onclick="remove_wishlist_item('.$row['product_id'].','.$user_id.')">X</a></td>
			<td class="product-thumbnail"><a href="single-product.php?product_id='.$row['product_id'].'"><img src="./admin/images/products/'.$row['product_image_title'].'" alt="'.$row['product_title'].'?>" /></a></td>
			<td class="product-name"><a href="single-product.php?product_id='.$row['product_id'].'">'.$row['product_title'].'</a></td>
			<td class="product-price"><span class="amount">$'.$row['product_new_price'].'</span></td>
			<td class="product-stock-status"><span class="wishlist-in-stock">'.$row['product_status'].'</span></td>
			<td class="product-add-to-cart"><a href="#"> Add to Cart</a></td>
			</tr>';
		}
	}
	else
	{
		echo $output = '<div class=" row col-lg-12"><h3 class="text-danger col-lg-12 text-center">Your Wishlist is Empty</h3></div>';
	}
	
	//return $output;

}
function delete_wishlist($product_id,$user_id)
{
	global $conn;
	$query= "DELETE FROM `wishlist` WHERE user_id='$user_id' AND product_id = '$product_id' ";
	$result = mysqli_query($conn, $query);
	if($result) 
	{
		echo json_encode(array("statusCode"=>200));
	}
	
	else
	{
		echo "Error: " . $query ."
		" . mysqli_error($conn);

	}
	

}
function certificates()
{
	global $conn;
	$query = "SELECT * FROM certificates";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo $show = '<div class="single-brand">
		<a href="#"><img src="./admin/images/certificates/'.$row['certificate_picture'].'" alt="'.$row['certificate_title'].'"></a>
		</div>';
	} 

}



?>

