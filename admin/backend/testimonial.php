<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 

if (isset($_GET['testimonial_category'])) 
{
     $testimonial_id = $_POST['testimonial_id'];
      testimonial_details($testimonial_id);
    
}



 ?>