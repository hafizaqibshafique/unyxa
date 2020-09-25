<?php include 'includes/header.php';?>
<?php 
if(isset($_POST['submit']))
{
    $gallery_details = $_POST['gallery_id']; 
    $gallery_details = explode("|",$_POST['gallery_id']);
    $gallery_id = $gallery_details[0];
    $gallery_old_image = $gallery_details[1];
    $gallery_title = mysqli_real_escape_string($conn, $_POST['gallery_title']);
    $gallery_description = mysqli_real_escape_string($conn, $_POST['gallery_description']);
    $date = date("Y/m/d");
    $day = date("l");
    $status = false;

    if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']))
    {
        /*Deleting old Picture*/
        $folder = 'images/gallery/';
        $delete_path = $folder . '' . $gallery_old_image;
        unlink($delete_path);

        /*Add New Picture*/
        $filename = $_FILES['file']['name'];
        $filetmpname = $_FILES['file']['tmp_name'];
        $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $filename = 'gallery_'. rand(1,99). time(). '.' . $extension_image;
        if(($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG'))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], $folder.$filename);
            $query = "UPDATE `gallery` SET `gallery_description`='$gallery_description', gallery_picture='$filename' WHERE gallery_id = '$gallery_id'";
            if(mysqli_query($conn, $query))
            {
                echo '<script>alert("Gallery Details Updated Successfully")</script>';
            }
        }
        else
        {
            echo '<script>alert("Files Upload Failed")</script>';
        }
    }
    else
    {
        $query = "UPDATE `gallery` SET `gallery_description`='$gallery_description',`gallery_title`='$gallery_title' WHERE gallery_id = '$gallery_id'";
        if(mysqli_query($conn, $query))
        {
            echo '<script>alert("Gallery Details Updated Successfully")</script>';
        }

    }




    $query = "UPDATE `gallery` SET `gallery_description`='$gallery_description' WHERE gallery_id = '$gallery_id'";
}

?>



<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Gallery</h4></div>


                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">                               
                        <h6 class="card-title">Add Gallery</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                        <div class="  col-12 col-md-12 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Select Gallery</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="fallback">
                                                        <select  required="" name="gallery_id"  id="gallery_id" class="form-control">
                                                            <option value="" selected>Choose...</option>
                                                            <?php echo load_galleries(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <!--  -->
                                        <div class="col-4 col-md-4 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Gallery Title</h4>
                                                </div>
                                                <div class="card-body " >
                                                    <div class="fallback">
                                                        <input id="gallery_title" required="" pattern="[a-zA-Z a-zA-Z]+" minlength="3" maxlength="190" title="Enter Only Alphabets" type="text" class="form-control rounded" name="gallery_title" placeholder="Gallery Title Name">
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>


                                        <div class="  col-12 col-md-12 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Gallery Description</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="fallback">
                                                        <textarea required="" name="gallery_description" id="editor"></textarea>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-4 col-md-4 mt-3">
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
                                        <div class="col-4 col-md-4 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">Update Gallery Picture (Optional)</h4>
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
                                                 <button type="submit" name="submit" id="update_gallery" class="btn btn-primary">Update Gallery</button>
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