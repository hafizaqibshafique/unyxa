<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 

if (isset($_GET['gallery_category'])) 
{
     $gallery_id = $_POST['gallery_id'];
      gallery_details($gallery_id);
    
}



 ?>