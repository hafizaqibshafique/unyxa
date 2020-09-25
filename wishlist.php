
<?php include 'includes/header.php';?>
<?php 
if(!isset($_SESSION['user_id']))
{
    echo("<script>window.location = 'login.php';</script>");
    exit;
}
else
{
    $user_id = $_SESSION['user_id'];    
}
?>


            <!--start-single-heading-banner-->
            <div class="single-banner-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="single-ban-top-content">
                                <p>Wishlist</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end-single-heading-banner-->
            <!--start-single-heading-->
            <div class="signle-heading">
                <div class="container">
                    <div class="row">
                        <!--start-shop-head -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="shop-head-menu">
                                <ul>
                                    <li><i class="fa fa-home"></i><a class="shop-home" href="index-2.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                                    <li class="shop-pro">Wishlist</li>
                                </ul>
                            </div>
                        </div>
                        <!--end-shop-head-->
                    </div>
                </div>
            </div>
            <!--end-single-heading-->
            <!-- wishlist-area start -->
            <div class="wishlist-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="wishlist-content">
                                <h1 class="card-header text-center">My Wish-List <i class="fa fa-heart text-danger"></i></h1>
                                <form action="#">
                                    <div class="wishlist-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>

                                                    <th class="product-remove"><span class="nobr">Remove</span></th>
                                                    <th class="product-thumbnail">Image</th>
                                                    <th class="product-name"><span class="nobr">Product Name</span></th>
                                                    <th class="product-price"><span class="nobr"> Unit Price </span></th>
                                                    <th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
                                                    <th class="product-add-to-cart"><span class="nobr">Add-to-cart </span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="show_wishlist">
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wishlist-area end -->
          <hr>
          
            <?php include 'includes/footer.php';?>