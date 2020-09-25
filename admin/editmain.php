<?php include 'includes/header.php';?>
<?php 
if(isset($_POST['submit']))
{

    if ($_POST['category_id']==null) 
    {
        echo "<script>alert('Kindly Select Main Category Firstly!');</script>";  
    }  

    else
    {
       $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
       $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);

       $sql = "UPDATE `main_categories` SET main_category_name = '$category_name' WHERE main_category_id = '$category_id'; ";
       if (mysqli_query($conn, $sql))
       {
            echo "<script>alert('Main Category Name Changed!');</script>";
            echo("<script>window.location = 'editmain.php';</script>");
       }
       else
       {
            echo "Error: " . $sql ." " . mysqli_error($conn);
       }
       
       mysqli_close($conn); 
    }   
   
}
?>
        <div class="page-content">

        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Main Categories</h4></div>

                            
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-header">                               
                                <h6 class="card-title">Edit Main Category</h6>                                
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">                                           
                                        <div class="col-12">
                                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                                                <div class="form-row">


                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Select Main Category To Edit</label>
                                                        <select id="inputState" name="category_id" class="form-control">
                                                            <option disabled="" selected>Choose...</option>
                                                            <?php echo load_main_categories(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Category Name</label>
                                                        <input type="text"  class="form-control rounded" name="category_name" required="" pattern="[a-zA-Z a-zA-z]+" minlength="3" maxlength="40" title="Enter Only Alphabets" id="inputEmail4" placeholder="Enter New Category Name">
                                                    </div>
                                                    
                                                </div>
                                                
                                               

                                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
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
    </div>
        <!-- END: Content-->

<?php include 'includes/footer.php';?>