<?php 

session_start();
include './admin/config/db.php'; 
include_once './admin/functions/functions.php';
/*if(!isset($_SESSION['user_email']))
{
    header("Location: login.php");
    exit;
}*/

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM `visitors` WHERE visitor_ip='$visitor_ip'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) < 1)
{
    $query= "INSERT INTO visitors VALUES ('', '$visitor_ip');";
    $result = mysqli_query($conn, $query);
}
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $ssl = 'https';
}
else {
  $ssl = 'http';
}

$app_url = ($ssl  )
          . "://".$_SERVER['HTTP_HOST']
          . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
          . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");

 ?>
<!doctype php>
<php class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Unyxa International</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800i" rel="stylesheet">

    <!-- favicon icon -->
    <link rel="shortcut icon" type="images/png" href="images/favicon.ico">

    <!-- all css here -->
    <link rel="stylesheet" href="style.css">
    <!-- modernizr css -->

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!--     <link rel="stylesheet" href="./admin/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css"> -->
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->

    <!-- CSS only -->

 

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</head>
<body>

    <div class="page-1">
        <!--Start-Header-area-->
        <header>
            <div class="header-top-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="header-top-left">
                                <!--Start-Header-language-->
                               <!--  <div class="dropdown top-language-wrap"> <a role="button" data-toggle="dropdown" data-target="#" class="top-language dropdown-toggle" href="#"> <img src="images/flag/e.png" alt="language"> English <span class="caret"></span> </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li role="presentation"><a role="menuitem" href="#"><img src="images/flag/e.png" alt="language"> English </a></li>
                                        <li role="presentation"><a role="menuitem" href="#"><img src="images/flag/f.png" alt="language"> French </a></li>
                                        <li role="presentation"><a role="menuitem" href="#"><img src="images/flag/g.png" alt="language"> German </a></li>
                                    </ul>
                                </div> -->
                                <!--End-Header-language-->
                                <!--Start-Header-currency-->
                                <!-- <div class="dropdown top-currency-wrap"> <a role="button" data-toggle="dropdown" data-target="#" class="top-currency dropdown-toggle" href="#"><span class="usd-icon"><i class="fa fa-usd"></i></span> USD <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li role="presentation"><a role="menuitem" href="#"> $ - Dollar </a></li>
                                        <li role="presentation"><a role="menuitem" href="#"> £ - Pound </a></li>
                                        <li role="presentation"><a role="menuitem" href="#"> € - Euro </a></li>
                                    </ul>
                                </div> -->
                                <!--End-Header-currency-->
                                <!--Start-welcome-message-->
                                <div class="welcome-mg hidden-xs"><span>Welcome To Unyxa International!</span></div>
                                <!--End-welcome-message-->
                            </div>
                        </div>
                        <!-- Start-Header-links -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="header-top-right">
                                <div class="top-link-wrap">
                                    <div class="single-link">
                                        <?php if (isset($_SESSION['user_email'])) {?>
                                        <div class="my-account"><a href="my-account.php"><span class="">My Account</span></a></div>
                                        <div class="wishlist"><a href="wishlist.php"><span class="">Wishlist</span></a></div>
                                        <div class="check"><a href="checkout.php"><span class="">Checkout</span></a></div>
                                        <div class=""><a href="logout.php"><span class="fa fa-sign-out">Log Out</span></a></div>
                                        <?php } ?>
                                        <?php if (!isset($_SESSION['user_email'])) {?>
                                        <div class="login"><a href="login.php"><span  class="">Log In</span></a></div>
                                        <div class="login"><a href="register.php"><span  class="">Sign Up</span></a></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End-Header-links -->
                    </div>
                </div>
            </div>
            <!--Start-header-mid-area-->
            <div class="header-mid-wrap">
                <div class="container">
                    <div class="header-mid-content">
                        <div class="row">
                            <!--Start-logo-area-->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="header-logo">
                                    <a href="index.php"><img src="images/logo/logo.png" style="height: 100px; width: 200px;" alt="Unyxa International"></a>
                                </div>
                            </div>
                            <!--End-logo-area-->
                            <!--Start-gategory-searchbox-->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div id="search-category-wrap">
                                    <form class="header-search-box" action="#" method="post">
                                        <div class="search-cat">
                                            <select class="category-items" name="category">
                                                <option>All Categories</option>
                                                <option>All Categories</option>
                                                <option>All Categories</option>
                                                <option>All Categories</option>
                                                <option>All Categories</option>


                                            </select>
                                        </div>
                                        <input type="search" placeholder="Search here..." id="text-search" name="search">
                                        <button id="btn-search-category" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!--End-gategory-searchbox-->
                            <!--Start-cart-wrap-->
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <ul class="header-cart-wrap">
                                    <li><a class="cart" href="#">My Cart: 2 items</a>
                                        <div class="mini-cart-content">
                                            <div class="cart-products-list">
                                                <div class="sing-cart-pro">
                                                    <div class="cart-image">
                                                        <a href="#"><img src="images/product/4.jpg" alt=""></a>
                                                    </div>
                                                    <div class="cart-product-info">
                                                        <a href="#" class="product-name"> Sample product </a>
                                                        <div class="cart-price">
                                                            <span class="quantity"><strong> 1 x</strong></span>
                                                            <span class="p-price">$110.00</span>
                                                        </div>
                                                        <a class="edit-pro" title="edit"><i class="fa fa-pencil-square-o"></i></a>
                                                        <a class="remove-pro" title="remove"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                                <div class="sing-cart-pro">
                                                    <div class="cart-image">
                                                        <a href="#"><img src="images/product/1.jpg" alt=""></a>
                                                    </div>
                                                    <div class="cart-product-info">
                                                        <a href="#" class="product-name">Sample product </a>
                                                        <div class="cart-price">
                                                            <span class="quantity"><strong> 1 x</strong></span>
                                                            <span class="p-price">$150.00</span>
                                                        </div>
                                                        <a class="edit-pro" title="edit"><i class="fa fa-pencil-square-o"></i></a>
                                                        <a class="remove-pro" title="remove"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-price-list">
                                                <p class="price-amount"><span class="cart-subtotal">SUBTotal :</span> <span>$260.00</span> </p>
                                                <div class="cart-checkout">
                                                    <a href="checkout.php">Checkout</a>
                                                </div>
                                                <div class="view-cart">
                                                    <a href="shopping-cart.php">View cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--End-cart-wrap-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End-header-mid-area-->
            <!--Start-Mainmenu-area -->
            <div class="mainmenu-area hidden-sm hidden-xs">
                <div id="sticker">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                                <div class="log-small"><a class="logo" href="index.php"><img style="height: 60px; width: 150px; margin-top: 0px;" alt="Unyxa International" src="images/logo/logo.png"></a></div>
                                <div class="mainmenu">
                                    <nav>
                                        <ul id="nav">
                                            <li class=""><a href="index.php">Home</a></li>
                                            <li class=""><a href="about-us.php" >About Us</a></li>
                                            <li class="angle-down"><a class="products" href="shop-grid.php">Products</a>
                                                <div class="megamenu">
                                                    <div class="megamenu-list">
                                                        <?php echo show_navbar_products(); ?>
                                                       <!--  <span class="mega-single">
                                                            <a href="shop-grid.php" class="mega-title">Sports-Wear</a>
                                                            <a href="shop-grid.php">Jackets</a>
                                                            <a href="shop-grid.php">Blazers</a>
                                                            <a href="shop-grid.php">T-Shirts</a>
                                                            <a href="shop-grid.php">T-Shirts</a>
                                                            <a href="shop-grid.php">T-Shirts</a>
                                                        </span> -->
                                                    </div>
                                                </div>
                                            </li>


                                            <li><a href="services.php">Services</a></li>
                                            <li><a href="gallery.php">Gallery</a></li>

                                            <li><a href="contact.php" >Contact Us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-Mainmenu-area-->
            <!--Start-Mobile-Menu-Area -->
            <div class="mobile-menu-area visible-sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="shop-grid.php">Products</a>
                                            <ul>
                                                <?php echo show_mobile_view_products(); ?>
                                               <!--  <li><a href="shop-grid.php">Sports-Wear</a>
                                                    <ul>
                                                        <li><a href="shop-grid.php">Jackets</a></li>
                                                        <li><a href="shop-grid.php">Blazers</a></li>
                                                        <li><a href="shop-grid.php">T-Shirts</a></li>
                                                        <li><a href="shop-grid.php">Collections</a></li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                        </li>


                                        <li><a href="services.php">Services</a></li>
                                        <li><a href="contact-us.php">Gallery</a></li>
                                        <li><a href="contact-us.php">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-Mobile-Menu-Area -->
        </header>
            <!--End-Header-area-->