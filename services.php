<?php include 'includes/header.php';?>
<!--start-single-heading-banner-->
<div class="single-banner-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">
                <div class="single-ban-top-content">
                    <p>Services</p>
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
                        <li class="shop-pro">Services</li>
                    </ul>
                </div>
            </div>
            <!--end-shop-head-->
        </div>
    </div>
</div>
<!--end-single-heading-->
<!--start-portfolio-area-->
<div class="isotope-area" id="latest-work">
    <div class="container">
        <div class="isotop-headign-area">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="section-title iso-title">
                        <h1>Services</h1>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 co-xs-12">
                <div class="isotop-items">
                    <!--start-single-portfolio-->
                    <?php $rows = services_pictures();
                    foreach ($rows as $row){ ?>
                     <div class="single-item   wordpress magento">
                        <h3 class="isotop-title"><a href="service-details.php?service_id=<?php echo $row['service_id'] ?>"><?php echo $row['service_title'] ?></a></h3>
                        <a href="#"><img style="height: 255px;width: 270px" src="admin/images/services/<?php echo $row['service_picture'] ?>" class="img-responsive" alt="<?php echo $row['service_title'] ?>"></a>
                        <a href="service-details.php?service_id=<?php echo $row['service_id'] ?>" class="isotop-effect"></a>
                    </div>
                    <!-- <div>.<br>.</div> -->
                <?php } ?>
            </div>
            <div>.<br>.</div>
        </div>
    </div>
</div>
</div>
<!--end-portfolio-area-->
<!--Start-newsletter-wrap-->

<!--End-newsletter-wrap-->
<?php include 'includes/footer.php';?>