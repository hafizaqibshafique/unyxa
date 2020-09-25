<?php include 'includes/header.php';?>
<?php 
if (isset($_POST['submit']))
{
    $certificate_title = mysqli_real_escape_string($conn, $_POST['certificate_title']);
    $date = date("Y/m/d");
    $day = date("l");
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];       
    $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    echo $filename = 'certificate_'. rand(1,999). time(). '.' . $extension_image;
    $folder = 'images/certificates/';
    if($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG')
    {
        $query= "INSERT INTO certificates VALUES ('', '$certificate_title','$filename','$date','$day');";
        if(mysqli_query($conn, $query))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], $folder.$filename);
            echo '<script>alert("Certificate Details Added Successfully")</script>'; 

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
                        <h6 class="card-title">Add Certificates</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Certificate Title</label>
                                                <input required="" type="text" class="form-control rounded" name="certificate_title" id="inputEmail4" placeholder="Enter Certificate Title" required="" pattern="[a-zA-Z]+" minlength="3" maxlength="150" title="Enter Only Alphabets">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">                               
                                                    <h4 class="card-title">File/Picture Upload</h4>
                                                </div>
                                                <div class="card-body">
                                                        <div class="fallback">
                                                            <input required="" name="file" type="file"  />
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