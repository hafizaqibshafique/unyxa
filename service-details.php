<?php include 'includes/header.php';?>
<?php 
if (isset($_GET['service_id'])) 
{
    $service_id = mysqli_real_escape_string($conn, $_GET['service_id']);

}
else
{
    $service_id = null;
}

 ?>
            <!--start-single-heading-banner-->
            <div class="single-banner-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">
                            <div class="single-ban-top-content">
                                <p>Protfolio Details</p>
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
                        <div class="col-lg-12">
                            <div class="shop-head-menu">
                                <ul>
                                    <li><i class="fa fa-home"></i><a class="shop-home" href="index-2.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                                    <li class="shop-pro">Protfolio Details</li>
                                </ul>
                            </div>
                        </div>
                        <!--end-shop-head-->
                    </div>
                </div>
            </div>
            <!--end-single-heading-->
            <div class="shop-product-area">
                <div class="container">
                    <div class="blog-all-wrap">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="blog-page-area">
                                    <!--start-single-blog-area-->
                                    <div class="single-blog margin-blog">
                                        <?php $rows = services_details($service_id);
                                        if ($rows!=false) {
                                        foreach ($rows as $row){ ?>
                                        <div class="blog-img port-details">
                                            <img src="admin/images/services/<?php echo $row['service_picture'] ?>" alt="<?php echo $row['service_title'] ?>">
                                        </div>
                                        <div class="blog-inner-content">
                                            <div class="blog-inner-text">
                                                <div class="blog-title">
                                                    <h4><?php echo $row['service_title'] ?></h4>
                                                </div>
                                            </div>
                                            <div class="blog-pragraph">
                                                <p><?php echo $row['service_description'] ?></p>
                                            </div>
                                        </div>
                                    <?php }} ?>
                                    <?php if ($rows==false) { ?>
                                        <div class="blog-title">
                                            <h4 class="text text-danger">No Service Found !</h4>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <!--end-single-blog-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Start-newsletter-wrap-->
            <div class="news-letter-wrap shop-news text-center">
                <div class="container">
                    <div class="row">
                        <div class="news-subscribe">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="letter-text">
                                    <h3><span class="h-color">Don't</span> Miss Out <br> <span><img src="images/newsletter/1.png" alt=""></span></h3>
                                    <p>Subscribe for the latest styles and sales, plus get <span class="h-color">30%</span> offer <br> your first order.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="email-area">
                                    <form class="input-group" action="#" method="post">
                                        <span class="input-group-addon icon-envlop">
                                        <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input type="email" class="form-control form_text" placeholder="Enter your email address">
                                        <input type="submit" class="submit" value="Sign up">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-newsletter-wrap-->
            <?php include 'includes/footer.php';?>