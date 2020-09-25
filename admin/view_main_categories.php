<?php include 'includes/header.php';?>

<?php 


if(isset($_POST['delete_category']))
{
    $main_category_id = $_POST['main_category_id'];    
    $query= "DELETE  FROM `main_categories` WHERE main_category_id='$main_category_id' ";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        echo '<script>alert("Main Category Deleted Successfully")</script>'; 
    }
    else
    {
        echo '<script>alert("Error! Kindly Delete the Sub Category of this Main Category Firstly")</script>';    
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
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Datatable</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Table</li>
                                <li class="breadcrumb-item active"><a href="#">Datatable</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">                               
                                <h4 class="card-title">Data Tabel</h4> 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Main Cat ID</th>
                                                <th>Main Cat Title</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo show_main_categories(); ?>
                                           
                                            
                                        </tbody>
                                        
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


        <?php include 'includes/footer.php';?>