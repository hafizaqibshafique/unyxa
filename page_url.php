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
	if($call_type == "about-us")
	{
		echo json_encode(array(
			'status'=>'success',
			'title'=> 'Unyxa International',
			/*'description' => 'Invoice receipt description',*/
			'url' => $call_type.'.php',
			'data'=>file_get_contents('about-us.php'),
		));
	}
	 if($call_type == "contact-us")
		{
			echo json_encode(array(
				'status'=>'success',
				'title'=> 'Contact Us',
				/*'description' => 'Home description',*/
				'url' => $call_type.'.php',
				'data'=>file_get_contents('contact-us.php'),
			));
		}

}