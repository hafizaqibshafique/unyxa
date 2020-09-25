<?php include 'includes/header.php';?>
<?php 
if(isset($_POST['submit']))
{
    $chart_details = explode("|",$_POST['size_chart_id']);
    $chart_id = $chart_details[0];
    $chart_old_picture = $chart_details[1];
    $chart_title = mysqli_real_escape_string($conn, $_POST['chart_title']);
    $chart_category_id = mysqli_real_escape_string($conn, $_POST['chart_category_id']);
    $chart_description = mysqli_real_escape_string($conn, $_POST['chart_description']);
    $date = date("Y/m/d");
    $day = date("l");
    $status = false;

    if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name']))
    {
        /*Deleting old Picture*/
        $folder = 'images/charts_categories/';
        $delete_path = $folder . '' . $chart_old_picture;
        unlink($delete_path);

        /*Add New Picture*/
        $filename = $_FILES['file']['name'];
        $filetmpname = $_FILES['file']['tmp_name'];
        $extension_image = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $filename = 'chart_'. rand(1,99). time(). '.' . $extension_image;
        if(($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG'))
        {
            move_uploaded_file($_FILES['file']['tmp_name'], $folder.$filename);
            $query = "UPDATE `charts` SET `chart_title`='$chart_title',`id`='$chart_category_id', `chart_description`='$chart_description', chart_picture='$filename' WHERE chart_id = '$chart_id'";
            if(mysqli_query($conn, $query))
            {
                echo '<script>alert("Size Chart Details Updated Successfully")</script>';
            }
        }
        else
        {
            echo '<script>alert("Files Upload Failed")</script>';
        }
    }
    else
    {
         $query = "UPDATE `charts` SET  `chart_title`='$chart_title',`id`='$chart_category_id', `chart_description`='$chart_description' WHERE chart_id = '$chart_id'";
        if(mysqli_query($conn, $query))
        {
            echo '<script>alert("Size Chart Details Updated Successfully")</script>';
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
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Size Charts</h4></div>


                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">                               
                        <h6 class="card-title">Edit Size Chart</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                        <div class="form-row"> 
                                            <div class="form-group col-md-12">
                                                <label for="size_chart_id">Select Size Chart to Edit</label>
                                                <select  required="" id="size_chart_id" name="size_chart_id" class="form-control selectpicker">
                                                    <option value="" >Choose...</option>
                                                    <?php echo load_charts(); ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="chart_category_id">Chart Category</label>
                                                <select required="" name="chart_category_id" id="chart_category_id" class="form-control">
                                                    <option value="" >Choose...</option>
                                                   <?php echo load_chart_categories(); ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="chart_title">Size Chart Name</label>
                                                <input required="" min="3" minlength="3"  type="text" class="form-control rounded" name="chart_title" id="chart_title" placeholder="Enter Title">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4">Size Chart Description</label>
                                                <textarea required="" name="chart_description" id="editor"></textarea>
                                            </div>

                                            <div class="col-12 col-md-6 mt-3">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between align-items-center">                               
                                                        <h4 class="card-title">Chart Picture Update</h4>
                                                    </div>
                                                    <div class="card-body">
                                                            <div class="fallback">
                                                                <input name="file" type="file" multiple />
                                                            </div>
                                                    </div>
                                                </div> 
                                            </div>

                                        </div>
                                        <hr>


                                        <button type="submit" name="submit" id="update_chart" class="btn btn-primary">Update Size Chart</button>
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