<?php include '../config/db.php';  include_once('../functions/functions.php');?>
<?php 
if (isset($_GET['action'])) 
{
    if ($_GET['action']=="insert") 
    {
        $status = false;
        $user_first_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_last_name = mysqli_real_escape_string($conn, $_POST['user_last_name']);
        $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
        $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
        $user_country = mysqli_real_escape_string($conn, $_POST['user_country']);
        $user_city = mysqli_real_escape_string($conn, $_POST['user_city']);
        $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
        $options = ['cost'=>11];
        $user_password = password_hash($user_password, PASSWORD_BCRYPT,$options);
        $date = date("Y/m/d");
        $day = date("l");

        $query = "SELECT * FROM `users` WHERE user_email='$user_email';";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0)
        {
            echo json_encode(array("statusCode"=>202));
        }
        else
        {
             $query= "INSERT INTO users VALUES ('', '$user_first_name', '$user_last_name', '$user_email', '$user_phone', '$user_address', '$user_city','$user_country', '$user_password','');";
            if(mysqli_query($conn, $query)) 
            {
                echo json_encode(array("statusCode"=>200));
            }
            else
            {
                echo("Error description: " . mysqli_error($conn));
                echo json_encode(array("statusCode"=>201));
            }
        }
        
        
    }
    if ($_GET['action']=="send_message") 
    {
        $status = false;
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
        $user_subject = mysqli_real_escape_string($conn, $_POST['user_subject']);
        $user_message = mysqli_real_escape_string($conn, $_POST['user_message']);
        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d H:i:sa");
        $day = date("l");

        $query= "INSERT INTO messages VALUES ('', '$user_name','$user_phone', '$user_email','$user_subject', '$user_message','$date','$day','unread');";
        if(mysqli_query($conn, $query)) 
        {
            echo json_encode(array("statusCode"=>200));
        }
        else
        {
            echo json_encode(array("statusCode"=>201));
        }

    }
    if ($_GET['action']=="send_query") 
    {
        $status = false;
        $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
        $query_type = mysqli_real_escape_string($conn, $_POST['query_type']);
        $query_detail = mysqli_real_escape_string($conn, $_POST['query_detail']);
        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d H:i:sa");
        $day = date("l");

        $query= "INSERT INTO query VALUES ('', '$user_name','$user_email','$user_phone','$query_type', '$query_detail','$date','$day','unread');";
        if(mysqli_query($conn, $query)) 
        {
            echo json_encode(array("statusCode"=>200));
        }
        else
        {
            echo json_encode(array("statusCode"=>201));
        }

    }
    
}



 ?>