<?php include 'includes/header.php';?>
<?php 
if(isset($_POST['delete_product']))
{
    $product_id = $_POST['product_id'];
    $query = "SELECT * FROM products_images WHERE product_id= '$product_id'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $product_image = $row['product_image_title'];
        $image_path  = "images/products/";
        $delete_path = $image_path . '' . $product_image;
        unlink($delete_path); 

    }    
    
    $query= "DELETE  FROM `products_images` WHERE product_id='$product_id' ";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        $query= "DELETE  FROM `products` WHERE product_id='$product_id' ";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            echo '<script>alert("Product Details Deleted Successfully")</script>';   
        }
         
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
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Report</h4></div>

                            
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Products</h4> 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                
                                                <th>Product Code</th>
                                                <th>Product Title</th>
                                                <th>Product Old Price</th>
                                                <th>Product New Price</th>
                                                <th>Product Status</th>
                                                <th>Sale Tag</th>
                                                <th>New Tag</th>
                                                <th>Main Cat Title</th>
                                                <th>Sub Cat Title</th>
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <?php echo show_all_products(); ?>
                                        
                                    </table>
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
        <!-- Button trigger modal -->
       

        <?php include 'includes/footer.php';?>
