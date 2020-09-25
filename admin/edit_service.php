<?php include 'includes/header.php';?>
<?php 
if(isset($_POST['submit']))
{

    $service_details = explode("|",$_POST['service_id']);
    $service_id = $service_details[0];
    $service_old_picture = $service_details[1];
    $service_title = mysqli_real_escape_string($conn, $_POST['service_title']);
    $service_description = mysqli_real_escape_string($conn, $_POST['service_description']);
    $date = date("Y/m/d");
    $day = date("l");
    $status = false;

    if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']))
    {
        /*Deleting old Picture*/
        $folder = 'images/services/';
        $delete_path = $folder . '' . $service_old_picture;
        unlink($delete_path);

        /*Add New Picture*/
        $filename = $_FILES['file']['name'];
        $filetmpname = $_FILES['file']['tmp_name'];
        $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $filename = 'service_'. rand(1,99). time(). '.' . $extension_image;
        if(($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG'))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], $folder.$filename);
            $query = "UPDATE `services` SET `service_title`='$service_title', `service_description`='$service_description', service_picture='$filename' WHERE service_id = '$service_id'";
            if(mysqli_query($conn, $query))
            {
                echo '<script>alert("Service Details Updated Successfully")</script>';
            }
        }
        else
        {
            echo '<script>alert("Files Upload Failed")</script>';
        }
    }
    else
    {
        $query = "UPDATE `services` SET `service_title`='$service_title',`service_description`='$service_description' WHERE service_id = '$service_id'";
        if(mysqli_query($conn, $query))
        {
            echo '<script>alert("Service Details Updated Successfully")</script>';
        }

    }

}

?>



<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Testimonails</h4></div>


                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">                               
                        <h6 class="card-title">Edit service</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                        <div class="  col-12 col-md-12 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Select service from Dropdown menu</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="fallback">
                                                        <select  required="" name="service_id"  id="service_id" class="form-control">
                                                            <option value="" selected>Choose...</option>
                                                            <?php echo load_services(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="  col-6 col-md-6 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Service Title</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="fallback">
                                                        <input class="form-control" type="text" min="3" id="service_title" name="service_title">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                        <div class="  col-12 col-md-12 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Service Description</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="fallback">
                                                        <textarea required="" name="service_description" id="editor"></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-6 col-md-6 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Existing Image</h4>
                                                </div>
                                                <div class="card-body " >
                                                    <div class="fallback">
                                                        <img  id="existing_image" src="" class="img-thumbnail" alt="">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-6 col-md-6 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Update service Picture (Optional)</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="fallback">
                                                        <input name="file" type="file" accept="image/*"  />
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-4 col-md-4 mt-3">
                                            <div class="card-body">
                                                <div class="fallback">
                                                 <button type="submit" name="submit" id="update_service" class="btn btn-primary">Update service</button>
                                             </div>
                                         </div>
                                     </div>

                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- END: Card DATA-->
 </div>
</main>
<!-- END: Content-->

<?php include 'includes/footer.php';?>