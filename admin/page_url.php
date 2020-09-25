<?php



if(isset($_GET['call_type']))
{
	$call_type = $_GET['call_type'];

	// if($call_type == "jquery")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'jQuery Page',
	// 		'description' => 'jQuery description',
	// 		'url' => 'jquery/'.$call_type.'.php',
	// 		'data'=>'This is <strong>jQuery</strong> data coming from ajax url'
	// 	));
	// }
	// else if($call_type == "php")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'PHP Page',
	// 		'description' => 'PHP description',
	// 		'url' => 'php/'.$call_type.'..php',
	// 		'data'=>'This is <strong>PHP</strong> data coming from ajax url'
	// 	));
	// }
	// else if($call_type == "home")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'Home Page',
	// 		'description' => 'Home description',
	// 		'url' => '',
	// 		'data'=>'This is <strong>Home</strong> data coming from ajax url'
	// 	));
	// }
	if($call_type == "aboutus")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Adee',
			/*'description' => 'Invoice receipt description',*/
			'url' => $call_type.'.php',
			'data'=>file_get_contents('aboutus.php'),
		));
	}
	// else if($call_type == "contact")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'Contact Us',
	// 		'description' => 'Home description',
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('contact.php'),
	// 	));
	// }
	// else if($call_type == "register-account")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'Regsiter Account',
	// 		/*'description' => 'Home description',*/
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('register-account.php'),
	// 	));
	// }
	// else if($call_type == "login")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'Login Account',
	// 		/*'description' => 'Home description',*/
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('login.php'),
	// 	));
	// }
	// else if($call_type == "cart")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'My Requests',
	// 		/*'description' => 'Home description',*/
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('cart.php'),
	// 	));
	// }
	// else if($call_type == "myaccount")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'My Account',
	// 		'description' => 'Home description',
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('myaccount.php'),
	// 	));
	// }
	// else if($call_type == "category")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'Category',
	// 		/*'description' => 'Home description',*/
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('category.php'),
	// 	));
	// }
	// else if($call_type == "index")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'index',
	// 		/*'description' => 'Home description',*/
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('index.php'),
	// 	));
	// }
	// else if($call_type == "login-worker")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'Login as Worker',
	// 		/*'description' => 'Home description',*/
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('login-worker.php'),
	// 	));
	// }
	// else if($call_type == "register-service")
	// {
	// 	echo json_encode(array(
	// 		'status'=>'success',
	// 		'title'=> 'Login as Worker',
	// 		/*'description' => 'Home description',*/
	// 		'url' => $call_type.'.php',
	// 		'data'=>file_get_contents('register-service.php'),
	// 	));
	// }
	else if($call_type == "addmain")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Unyxa Inrternational',
			'description' => 'Add Main Category',
			'url' => $call_type.'.php',
			'data'=>file_get_contents('addmain.php'),
		));
	}
	else if($call_type == "editmain")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Unyxa Inrternational',
			'description' => 'Edit Main Category',
			'url' => $call_type.'.php',
			'data'=>file_get_contents('editmain.php'),
		));
	}
	else if($call_type == "view_main_categories")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Unyxa Inrternational',
			'description' => 'View Main Categories',
			'url' => $call_type.'.php',
			'data'=>file_get_contents('view_main_categories.php'),
		));
	}
}