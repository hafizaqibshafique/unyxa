<?php include 'includes/header.php';?>
<?php 
if(isset($_POST['submit']))
{  
    if ($_POST['sub_category_id']==null) {
        echo "<script>alert('Kindly Select Sub Category Firstly!');</script>";
          
      }  
      else
      {
         $sub_category_id = mysqli_real_escape_string($conn, $_POST['sub_category_id']);
         $sub_category_name = mysqli_real_escape_string($conn, $_POST['sub_category_name']);

         $sql = "UPDATE `sub_categories` SET sub_category_name = '$sub_category_name' WHERE sub_category_id = '$sub_category_id'; ";
         if (mysqli_query($conn, $sql))
         {
            echo "<script>alert('Sub Category Name Changed!');</script>";
            echo("<script>window.location = 'editsub.php';</script>");
        }
        else
        {
            echo "Error: " . $sql ." " . mysqli_error($conn);
        }
        
        mysqli_close($conn);
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
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Sub Categories</h4></div>


                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">                               
                        <h6 class="card-title">Edit</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="form-row">


                                                   <!--  <div class="form-group col-md-6">
                                                        <label for="inputState">Select Main Category</label>
                                                        <select id="inputState" class="form-control">
                                                            <option selected>Choose...</option>
                                                            <option>...</option>
                                                        </select>
                                                    </div> -->

                                                    <div class="form-group col-md-6">
                                                        <label for="inputState">Select Sub Category</label>
                                                        <select required="" id="inputState" name="sub_category_id" class="form-control">
                                                            <option selected=""  disabled="">Choose...</option>
                                                            <?php echo load_sub_categories(); ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Sub Category Name</label>
                                                        <input required="" type="text"  class="form-control rounded" name="sub_category_name" required="" pattern="[a-zA-Z]+" minlength="3" maxlength="40" title="Enter Only Alphabets" id="inputEmail4" placeholder="Enter New Sub Category Name">
                                                    </div>
                                                    
                                                </div>
                                                


                                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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