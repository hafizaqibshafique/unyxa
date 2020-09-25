<?php include 'includes/header.php';?>
<?php 
if (isset($_POST['submit']))
{
    $testimonial_title = mysqli_real_escape_string($conn, $_POST['testimonial_title']);
    $testimonial_description = mysqli_real_escape_string($conn, $_POST['testimonial_description']);
    $date = date("Y/m/d");
    $day = date("l");
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];       
    $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    echo $filename = 'testimonial_'. rand(1,99). time(). '.' . $extension_image;
    $folder = 'images/testimonials/';
    if($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG')
    {
        $query= "INSERT INTO testimonials VALUES ('', '$testimonial_title','$testimonial_description','$filename','$date','$day');";
        if(mysqli_query($conn, $query))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], $folder.$filename);
            echo '<script>alert("Testimonial Details Added Successfully")</script>'; 

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
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Testimonials</h4></div>


                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">                               
                        <h6 class="card-title">Add Testimonial</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="inputEmail4">Testimonial Owner</label>
                                                <input type="text" name="testimonial_title" class="form-control rounded" name="title" id="inputEmail4" placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="inputEmail4">Testimonial Description</label>
                                                <textarea name="testimonial_description" id="editor" class="form-control h-150px ckeditor" required="" rows="6"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">                               
                                                    <h4 class="card-title">File/Picture Upload</h4>
                                                </div>
                                                <div class="card-body">
                                                        <div class="fallback">
                                                            <input required="" name="file"  type="file" multiple />
                                                        </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <hr>
                                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
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