<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 

if (isset($_GET['service_category'])) 
{
     $service_id = $_POST['service_id'];
      service_details($service_id);
    
}




 ?>