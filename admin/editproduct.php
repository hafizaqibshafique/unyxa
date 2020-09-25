<?php include 'includes/header.php';?>

<?php 
if(isset($_POST['submit']))
{  
    $product_id = $_POST['product_id'];
    $product_main_id = mysqli_real_escape_string($conn, $_POST['main_category_id']);
    $product_sub_id = mysqli_real_escape_string($conn, $_POST['sub_category_id']);
    $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
    $product_code = mysqli_real_escape_string($conn, $_POST['product_code']);
    $product_old_price = mysqli_real_escape_string($conn, $_POST['product_old_price']);
    $product_new_price = mysqli_real_escape_string($conn, $_POST['product_new_price']);
    $product_sample_price = mysqli_real_escape_string($conn, $_POST['product_sample_price']);
    $product_status = mysqli_real_escape_string($conn, $_POST['product_status']);
    $product_tags = mysqli_real_escape_string($conn, $_POST['product_tags']);
    $product_sale_tag = mysqli_real_escape_string($conn, $_POST['product_sale_tag']);
    $product_new_tag = mysqli_real_escape_string($conn, $_POST['product_new_tag']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $date = date("Y/m/d");
    $day = date("l");

    $update_query = "UPDATE `products` SET `main_category_id`='$product_main_id',`sub_category_id`='$product_sub_id',`product_title`='$product_title',`product_code`='$product_code',`product_old_price`='$product_old_price',`product_new_price`='$product_new_price',`product_status`='$product_status',`product_tags`='$product_tags',`product_sale_tag`='$product_sale_tag',`product_new_tag`='$product_new_tag',`product_sample_tag`='$product_sample_tag',`product_description`='$product_description',`date`='$date',`day`='$day' WHERE product_id = '$product_id' ";

    if (file_exists($_FILES['file']['tmp_name'][0]) || is_uploaded_file($_FILES['file']['tmp_name'][0])) 
    {
        $status = false;
        $countfiles = count($_FILES['file']['name']);
        $folder = 'images/products/';
        
        /*Delete Previous Files*/
        $product_images = product_images($product_id);
        foreach ($product_images as $product_image)
        {
            $image =  $product_image['product_image_title'];
            $delete_path = $folder . '' . $image;
            unlink($delete_path);
        }
        $query= "DELETE  FROM `products_images` WHERE product_id='$product_id'";
        if(mysqli_query($conn, $query)){}
        /*End Delete Previous File*/

        for($i=0;$i<$countfiles;$i++)
        {
            $filename = $_FILES['file']['name'][$i];
            $filetmpname = $_FILES['file']['tmp_name'][$i];
            $extension_image = pathinfo($_FILES["file"]["name"][$i], PATHINFO_EXTENSION);
            $filename = 'product_'. rand(1,999). time(). '.' . $extension_image;
            if(($extension_image=='jpg' || $extension_image=='jpeg' || $extension_image=='png' || $extension_image=='gif' || $extension_image=='PNG'))
            {
                
                 move_uploaded_file($_FILES['file']['tmp_name'][$i], $folder.$filename);
                 $query= "INSERT INTO products_images VALUES ('$product_id', '', '$filename');";
                 if(mysqli_query($conn, $query))
                 {
                    if(mysqli_query($conn, $update_query))
                    {
                        $status = true;
                        

                    }

                 }
            }
            else
            {    
                 echo '<script>alert("Files Upload Failed")</script>';
                 break;
            }
            
        }
        if ($status== true) {
            echo "<script>alert('Product Details & Pictures Updated Successfully!');</script>";
            
        }
        
    }
    else
    {
         
        
        if (mysqli_query($conn, $update_query))
        {
             echo "<script>alert('Product Details Updated Successfully!');</script>";
             echo("<script>window.location = 'view_products.php';</script>");
        }
        else
        {
             echo "Error: " . $query ." " . mysqli_error($conn);
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
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Products</h4></div>


                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">                               
                        <h6 class="card-title">Edit Product</h6>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="product_id">Select Product to Edit</label>
                                                <select  required="" name="product_id" class="form-control" id="product_id">
                                                 <option value="" selected="" hidden>Select Product</option>
                                                 <?php echo load_products(); ?>
                                             </select>
                                            </div>

                                           <!-- <div class="form-row" id="product_details">
                                               
                                           </div> -->
                                           <div class="form-group col-md-6">
                                             <label for="main_category_id"> Main Category</label>
                                             <select  required="" name="main_category_id" id="main_category_id" class="form-control ">
                                                <option value="" selected="">Choose</option>
                                                <?php echo load_main_categories(); ?>


                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                         <label for="sub_category_id"> Sub Category</label>
                                         <select required="" name="sub_category_id" id="sub_category_id" class="form-control">
                                             
                                             <?php echo load_sub_categories(); ?>
                                         </select>
                                     </div>


                                     <div class="form-group col-md-6">
                                         <label for="product_title">Product Title</label>
                                         <input required=""  type="text" class="form-control rounded" name="product_title" id="product_title" placeholder="Enter Title" pattern="[a-zA-Z a-zA-Z]+" minlength="3" maxlength="150" title="Enter Only Alphabets">
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="product_code">Product Code</label>
                                         <input  required="" type="text" class="form-control rounded" name="product_code" id="product_code" placeholder="Code">
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="product_old_price">Product Price Old</label>
                                         <input required="" min="0" max="1000"  type="number" class="form-control rounded" name="product_old_price" id="product_old_price" placeholder="Old Price">
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="product_new_price">Product Price New</label>
                                         <input required="" min="0" max="1000" type="number" class="form-control rounded" name="product_new_price" id="product_new_price" placeholder="New Price">
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="product_status">Select Product Status</label>
                                         <select required="" name="product_status" id="product_status" class="form-control">
                                             <option value="" selected>Choose...</option>
                                             <option value="In Stock">In Stock</option>
                                             <option value="Out of Stock">Out Of Stock</option>
                                         </select>
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label for="product_tags">Product Tags</label>
                                         <input required="" type="text" class="form-control rounded" name="product_tags" id="product_tags" placeholder="Tags">
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label >Product Featured</label><br>
                                         <!-- Default inline 1-->
                                         <div class="custom-control custom-checkbox custom-control-inline">
                                             <input value="sale" name="product_sale_tag" id="product_sale_tag" type="checkbox" class="custom-control-input" id="defaultInline1">
                                             <label class="custom-control-label text-danger" for="product_sale_tag">On Sale</label>
                                         </div>

                                         <!-- Default inline 2-->
                                         <div class="custom-control custom-checkbox custom-control-inline">
                                             <input value="new"  name="product_new_tag" type="checkbox" class="custom-control-input" id="product_new_tag">
                                             <label class="custom-control-label text-primary" for="product_new_tag">New Item</label>
                                         </div>

                                     </div>

                                     <div class="form-group col-md-12">
                                         <label for="inputEmail4">Description</label>
                                         <textarea required=""  id="editor" name="product_description"></textarea>
                                     </div>
                                     <div class="col-12 col-md-6 mt-3">
                                         <div class="card">
                                             <div class="card-header d-flex justify-content-between align-items-center">                               
                                                 <h4 class="card-title">Pictures Upload (Optional)</h4>
                                             </div>
                                             <div class="card-body">

                                                 <div class="fallback">
                                                     <input name="file[]" type="file" multiple accept="image/*"  />
                                                 </div>

                                             </div>
                                         </div> 
                                     </div>


                                 </div>
                                 <hr>


                                 <button type="submit" name="submit" id="update_product" class="btn btn-primary">Update Product</button>
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


