<?php include 'includes/header.php';?>
<?php

if (isset($_GET['gallery_id'])) 
{
    $gallery_id = $_GET['gallery_id'];

}
if (isset($_POST['submit'])) 
{
    if (isset($_POST['newsletter_email'])) 
    {
        $newsletter_email = mysqli_real_escape_string($conn, $_POST['newsletter_email']);
        $found_email = check_newsletter_email($newsletter_email);
       if ($found_email) 
       {
          $msg = '<div class=" alert alert-danger  alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Already Susbsribed! </strong>You have already subsribed for this offer.
          </div>'; 
       }
       else
       {
            $query= "INSERT INTO newsletter VALUES ('', '$newsletter_email');";
            if(mysqli_query($conn, $query))
            {
                $msg = '<div class=" alert alert-success  alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success! </strong>You have successfully subsribed for this amazing offer.
                </div>';   
            }
       }
        
    }
    else
    {
        $msg = '<div class=" alert alert-danger  alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Email Reuqired! </strong>Please Enter you Email Address.
        </div>';
    }
    

}
 ?>
            <!--start-single-heading-banner-->
            <div class="single-banner-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">
                            <div class="single-ban-top-content">
                                <p>Gallery Details</p>
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
                                    <li class="shop-pro">Gallery Details</li>
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
                                    <?php echo show_gallery_detials($gallery_id); ?>
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
                                    <form class="input-group" action method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <span class="input-group-addon icon-envlop">
                                        <i class="fa fa-envelope-o"></i>
                                        </span>
                                        <input required="" type="email" class="form-control form_text" placeholder="Enter your email address" name="newsletter_email">
                                        <input type="submit" class="submit" name="submit" value="Subscribe">
                                    </form>
                                </div>
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-newsletter-wrap-->
            <?php include 'includes/footer.php';?>}
