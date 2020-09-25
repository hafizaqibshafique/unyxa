<?php include 'includes/header.php';?>
<?php 
if (isset($_POST['submit']))
{
    $category_id = mysqli_real_escape_string($conn, $_POST['chart_category']);
    $chart_title = mysqli_real_escape_string($conn, $_POST['chart_title']);
    $chart_description = mysqli_real_escape_string($conn, $_POST['chart_description']);
    $date = date("Y/m/d");
    $day = date("l");
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];       
    $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    echo $filename = 'category_'. rand(1,99). time(). '.' . $extension_image;
    $folder = 'images/charts_categories/';
    if($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG')
    {
        $query= "INSERT INTO charts VALUES ('', '$category_id','$chart_title','$chart_description','$filename','$date','$day');";
        if(mysqli_query($conn, $query))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], $folder.$filename);
            echo '<script>alert("Size Chart Category Added Successfully")</script>'; 

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
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Chart Categories</h4></div>


                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">                               
                        <h6 class="card-title">Add Size Chart</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="size_chart_id">Select Chart Category</label>
                                                <select name="chart_category" id="size_chart_id" class="form-control">
                                                    <option disabled="" selected>Choose...</option>
                                                   <?php echo load_chart_categories(); ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Size Chart Name</label>
                                                <input type="text" name="chart_title" class="form-control rounded" name="title" id="inputEmail4" placeholder="Title">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Size Chart Description</label>
                                                <textarea name="chart_description" id="editor" required="" placeholder="Enter Description" type="text" required="" rows="6" class="form-control h-250px ckeditor "></textarea>
                                            </div>

                                            <div class="col-12 col-md-6 mt-3">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between align-items-center">                               
                                                        <h4 class="card-title">Picture Upload</h4>
                                                    </div>
                                                    <div class="card-body">
                                                       
                                                            <div class="fallback">
                                                                <input required="" name="file" type="file" accept="image/*"  />
                                                            </div>
                                                        
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