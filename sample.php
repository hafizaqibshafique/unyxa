<?php include 'includes/header.php';?>
<?php

// if (isset($_SERVER['HTTPS']) &&
//     ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
//     isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
//     $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
//   $ssl = 'https';
// }
// else {
//   $ssl = 'http';
// }

// $app_url = ($ssl  )
//           . "://".$_SERVER['HTTP_HOST']
//           . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
//           . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
  ?>



<div style="padding:10px;"> </div>


<!--[Load Page Content - Start]-->
<div class="ScreenData container" style="max-width : 900px; margin : 0 auto; border: 1px dotted #CCC; background : #FFF; border-radius: 50px;padding-top:10px;">

 	<div class="text-center">

 		<br><br>
 		<h3 > Change Browser URL Without Refreshing Page </h3>

 		<br><br>

 		<span class="btn btn-info btn_load_screen" call_type="home"> Home</span> |
		<span class="btn btn-secondary btn_load_screen" call_type="jquery"> jQuery</span> |
 		<span class="btn btn-dark btn_load_screen" call_type="php"> PHP</span> |
 		<span class="btn btn-success btn_load_screen" call_type="about-us"> Invoice receipt</span> |
 		<br><br>
 	</div>

	<br><br>
 	<span class="post_msg container"></span>

 	<br><br>

</div>


<!--[Load Page Content - End]-->



<?php include 'includes/footer.php';?>