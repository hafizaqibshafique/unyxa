<?php include 'includes/header.php';?>
<?php 
if (isset($_POST['submit']))
{
    $gallery_title = mysqli_real_escape_string($conn, $_POST['gallery_title']);
    $gallery_description = mysqli_real_escape_string($conn, $_POST['gallery_description']);
    $date = date("Y/m/d");
    $day = date("l");
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];       
    $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    echo $filename = 'gallery_'. rand(1,99). time(). '.' . $extension_image;
    $folder = 'images/gallery/';
    if($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG')
    {
        $query= "INSERT INTO gallery VALUES ('','$gallery_title','$gallery_description','$filename','$date','$day');";
        if(mysqli_query($conn, $query))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], $folder.$filename);
            echo '<script>alert("Gallery Added Successfully")</script>'; 

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
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="gallery_title">Gallery Title</label>
                                                <input required="" pattern="[a-zA-Z a-zA-Z]+" minlength="3" maxlength="190" title="Enter Only Alphabets" type="text" class="form-control rounded" name="gallery_title" id="gallery_title" placeholder="Gallery Title Name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="editor">Gallery Description</label>
                                                <textarea id="editor" name="gallery_description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">
                                                    <h4 class="card-title">File/Picture Upload</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="fallback">
                                                        <input required="" name="file" type="file" accept="image/*"  />
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <hr>
                                        <button type="submit" name="submit" class="btn btn-primary">Add Gallery</button>
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