<?php include 'includes/header.php';?>
<?php
if (isset($_GET['product_id'])) 
{
    $product_id = $_GET['product_id'];
    $row = product_details($product_id);
    $row = json_decode($row, true);

}
?>
<!--start-single-heading-banner-->
<div class="single-banner-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

                <div class="single-ban-top-content">
                    <p>Product Details</p>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--start-shop-head -->
                <div class="shop-head-menu">
                    <ul>
                        <li><i class="fa fa-home"></i><a class="shop-home" href="index-2.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                        <li class="shop-pro">Product Details</li>
                    </ul>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
</div>
<!--end-single-heading-->
<!--start-signle-page-->
<div class="single-page-area padding-t">
    <!-- Single Product details Area -->
    <div class="single-product-details-area">
        <!-- Single Product View Area -->
        <div class="single-product-view-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                        <!-- Single Product View -->
                        <div class="single-procuct-view">

                            <!-- Simple Lence Gallery Container -->
                            <div class="simpleLens-gallery-container" id="p-view">
                                <div class="simpleLens-container tab-content">
                                    <?php $rows = product_images($product_id); 
                                    foreach ($rows as $rows){ ?>
                                      <!--   <script type="text/javascript">
                                            $("#p-view-").addClass('active');
                                        </script> -->
                                        <div class="tab-pane active" id="p-view-<?php echo $rows['product_image_id'] ?>">

                                            <div class="simpleLens-big-image-container">
                                                <a class="simpleLens-lens-image" data-lens-image="./admin/images/products/<?php echo $rows['product_image_title'] ?>">
                                                    <img src="./admin/images/products/<?php echo $rows['product_image_title'] ?>" class="simpleLens-big-image" alt="<?php echo $rows['product_image_id'] ?>">
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- Simple Lence Thumbnail -->
                                <div class="simpleLens-thumbnails-container text-center">
                                    <div id="single-product" class="owl-carousel custom-carousel">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <?php $rows = product_images($product_id);
                                            foreach ($rows as $rows){ ?>
                                                <li class="active"><a href="#p-view-<?php echo $rows['product_image_id'] ?>" role="tab" data-toggle="tab"><img height="100" width="100" src="./admin/images/products/<?php echo $rows['product_image_title'] ?>" alt="productd"></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Simple Lence Thumbnail -->
                            </div>
                            <!-- End Simple Lence Gallery Container -->
                        </div>
                        <!-- End Single Product View -->
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 single-product-details">
                        <div class="single-pro">
                            <div class="product-name">
                                <h3><?php echo $row['product_title'] ?></h3>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-content">
                                <div class="pro-rating single-p">
                                    <ul class="single-pro-rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li class="r-grey"><i class="fa fa-star"></i></li>
                                        <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                    <!-- <div class="rating-links">
                                        <a href="#product-rev">1 Review(s)</a>
                                        <span class="separator">|</span>
                                        <a href="#product-rev" class="add-to-review">Add Your Review</a>
                                    </div> -->
                                </div><br>
                                <div class="pro-price single-p">
                                    <span class="price-text">Price:</span>
                                    <span class="normal-price">$<?php echo $row['product_new_price'] ?></span>
                                    <span class="old-price"><del>$<?php echo $row['product_old_price'] ?></del></span>
                                </div>
                            </div>
                            <p>Availability: <span class="signle-stock"><?php echo $row['product_status'] ?></span></p>
                                       <!--  <div class="product-reveiw">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis voluptatibus laudantium perferendis veritatis nam tempore vel accusamus natus reiciendis asperiores nisi quod, quaerat quidem dicta officiis repellat, excepturi dolores sed itaque quam? Assumenda eveniet ut voluptates adipisci maxime est aperiam quis soluta fugiat? Debitis totam sed iste laboriosam a.</p>
                                        </div> -->
                                        <div class="clear"></div>
                                        <!--start-size-area-->
                                       <!--  <div class="skill-checklist">
                                            <label for="skillc"><span class="size-cho">Size:</span>
                                            </label>
                                            <br>
                                            <select id="skillc">
                                                <option value="">S</option>
                                                <option value="">M</option>
                                                <option value="">L</option>
                                                <option value="">XL</option>
                                                <option value="">XXL</option>
                                            </select>
                                        </div> -->
                                        <!--end-size-area-->
                                        
                                        <div class="">
                                            <div class="quick-add-to-cart">
                                                <form method="post" class="cart">
                                                    <div class="qty-button">
                                                        <input required type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">

                                                        <div class="box-icon button-plus">
                                                            <input required type="button" class="qty-increase " onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;" value="+">
                                                        </div>
                                                        <div class="box-icon button-minus">
                                                            <input required type="button" class="qty-decrease" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) qty_el.value--;return false;" value="-">
                                                        </div>
                                                    </div>
                                                    <div class="add-to-cartbest single-add">
                                                        <a href="#" title="add to cart">
                                                            <div><span>Add to cart</span></div>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- social-markting end -->
                                        <div class="clear"></div>
                                        <hr>
                                        <div class="single-pro-cart">
                                            <div class="add-to-link single-p">
                                                <a href="#" title="Wishlist">
                                                    <div><i class="fa fa-heart"></i></div>
                                                </a>
                                                <a href="#" title="Email">
                                                    <div><i class="fa fa-envelope"></i></div>
                                                </a>
                                                <a href="#" title="Compare">
                                                    <div><i class="fa fa-random"></i></div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="social-icon-img">
                                            <div class="sharethis-inline-share-buttons"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product View Area -->
                </div>
                <!-- End Single details Area -->
            </div>
            <!--End-signle-page-->
            <!-- Single Description Tab -->
            <div class="single-product-description">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-description-tab custom-tab">
                                <!-- tab bar -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#product-des" data-toggle="tab">Product Description</a></li>
                                    <li><a href="#product-rev" data-toggle="tab">Reviews</a></li>
                                    <li><a href="#product-tag" data-toggle="tab">Product Tags</a></li>
                                </ul>
                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="product-des">
                                        <p><?php echo $row['product_description'] ?> </p>
                                    </div>
                                    <div class="tab-pane" id="product-rev">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                                                <div class="product-rev-left">
                                                    <p class="product-action">
                                                        <a href="http://unyxa.com/">OurStore </a> <b>Overall Review from Customers</b> <!-- <span>OurStore</span> -->
                                                    </p>
                                                    <div class="product-ratting">
                                                        <table class="">
                                                            <tr>
                                                                <td>Quality</td>
                                                                <td class="quality-single-p">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price</td>
                                                                <td class="quality-single-p">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Value</td>
                                                                <td class="quality-single-p">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <!-- <p>OurStore<span class="posted">(Posted on 20/07/2017)</span></p> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                                                <div class="product-rev-right">
                                                    <h3>You're reviewing: Proin lectus ipsum</h3>
                                                    <h3><b>How do you rate this product? <span>*</span></b></h3>
                                                    <div class="product-rev-right-table table-responsive">
                                                    <form method="post"  id="review_form">
                                                        <table>
                                                            <thead>
                                                                <tr class="first last">
                                                                    <th>&nbsp;</th>
                                                                    <th><span class="nobr">1 star</span></th>
                                                                    <th><span class="nobr">2 stars</span></th>
                                                                    <th><span class="nobr">3 stars</span></th>
                                                                    <th><span class="nobr">4 stars</span></th>
                                                                    <th><span class="nobr">5 stars</span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <tr>
                                                                        <th>Quality</th>
                                                                        <th><input required  value="1" type="radio" class="radio" name="quality"></th>
                                                                        <th><input required value="2" type="radio" class="radio" name="quality"></th>
                                                                        <th><input required value="3" type="radio" class="radio" name="quality"></th>
                                                                        <th><input required value="4" type="radio" class="radio" name="quality"></th>
                                                                        <th><input required value="5" type="radio" class="radio" name="quality"></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Price</th>
                                                                        <th><input required value="1" type="radio" class="radio" name="price"></th>
                                                                        <th><input required value="2" type="radio" class="radio" name="price"></th>
                                                                        <th><input required value="3" type="radio" class="radio" name="price"></th>
                                                                        <th><input required value="4" type="radio" class="radio" name="price"></th>
                                                                        <th><input required value="5" type="radio" class="radio" name="price"></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Value</th>
                                                                        <th><input required value="1" type="radio" class="radio" name="value"></th>
                                                                        <th><input required value="2" type="radio" class="radio" name="value"></th>
                                                                        <th><input required value="3" type="radio" class="radio" name="value"></th>
                                                                        <th><input required value="4" type="radio" class="radio" name="value"></th>
                                                                        <th><input required value="5" type="radio" class="radio" name="value"></th>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                      <td colspan="6">
                                                                        <div class="form-group alert alert-dismissible">
                                                                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                                          <strong class="text form-group"></strong>
                                                                        </div>
                                                                        <div class="porduct-rev-right-form">
                                                                            <div class="form-goroup form-group-button">
                                                                                <input type="hidden" name="product_id" id="product_id" value="<?php echo $row['product_id'] ?>">
                                                                                <button class="btn custom-button" value="submit" type="submit" id="add_review">Submit Review</button>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            </tfoot>
                                                    </table>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="product-tag">
                                    <h2>Other people marked this product with these tags:</h2>
                                    <p class="product-action">
                                        <a href="http://bootexperts.com/">Laptop </a> <span>(1)</span>
                                    </p>
                                    <!-- <form method="post" action="#" class="product-form">
                                        <label>Add Your Tags:</label>
                                        <input required type="text" class="form-control" required="required">
                                        <button class="btn custom-button" value="submit">Add Tags</button>
                                    </form>
                                    <p>Use spaces to separate tags. Use single quotes (') for phrases.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Description Tab -->
       
        <?php include 'includes/footer.php';?>