<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 
if (isset($_GET['action'])) 
{
    if ($_GET['action']=="unread_messages") 
    {
    	echo show_unread_queries();
    }
    if ($_GET['action']=="show_messages") 
    {
    	echo show_all_queries();
    }
    if ($_GET['action']=="messages_details") 
    {
    	 echo show_queries_details();
    }
    if ($_GET['action']=="mark_as_read") 
    {
    	$message_id = mysqli_real_escape_string($conn, $_POST['message_id']);
    	 echo mark_as_read($message_id);
    }
    if ($_GET['action']=="mark_as_unread") 
    {
    	$message_id = mysqli_real_escape_string($conn, $_POST['message_id']);
    	 echo mark_as_unread($message_id);
    }



}


 ?>