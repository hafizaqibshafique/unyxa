<?php include 'includes/header.php';?>
            <!--start-single-heading-banner-->
            <div class="single-banner-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="single-ban-top-content">
                                <p>Size Charts</p>
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
                                    <li><i class="fa fa-home"></i><a class="shop-home" href="index.php"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                                    <li class="shop-pro">Size Charts</li>
                                </ul>
                            </div>
                        </div>
                        <!--end-shop-head-->
                    </div>
                </div>
            </div>
            <!--end-single-heading-->
            <!--start-shop-product-area-->
            <div class="shop-product-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <!-- Left-Sidebar-start-->
                            <div class="left-sidebar-title">
                                <h2>Size Chart Options</h2>
                            </div>
                            <!-- Shop-Layout-start -->
                            <div class="left-sidebar">
                                <div class="shop-layout">
                                    <div class="layout-title">
                                        <h2>Size Chart Categories</h2>
                                    </div>
                                    <div class="layout-list">
                                        <ul>
                                            <?php $rows = show_chart_categories_count();
                                            foreach ($rows as $row){ ?>
                                                <li><a href="#charts" onclick="show_size_charts(<?php echo $row['id'] ?>)"  title="<?php echo $row['category_title'] ?>"><?php echo $row['category_title'] ?></a><span>(<?php echo $row['count'] ?>)</span></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                               
                              
                              
                            </div>
                            <!-- End-Left-Sidebar -->
                          
                          
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <!-- Shop-Product-View-start -->
                            <div class="shop-product-view">
                                <!-- Shop Product Tab Area -->
                                <div class="product-tab-area">
                                    <!-- Tab Bar -->
                                   
                                    <!-- End-Tab-Bar -->
                                    <!-- Tab-Content -->
                                    <div class="tab-content">
                                        <!-- Shop Product-->
                                        <div id="shop-product" class="tab-pane active">
                                            <div class="row" id="show_charts">
                                                <!-- Start-single-product -->
                                           <!--      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="single-product shop-mar-bottom">
                                                   
                                                        <div class="product-img-wrap">
                                                            <a class="product-img" href="#"> <img src="images/product/10.jpg" alt="product-image" /></a>
                                                            
                                                            <div class="add-to-cart">
                                                                <a href="#" title="add to cart">
                                                                    <div><i class="fa fa-shopping-cart"></i><span>Quick View</span></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-info text-center">
                                                            <div class="product-content">
                                                                <a href="#"><h3 class="pro-name">Sample Product</h3></a>
                                                                
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- End-single-product -->
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Tab Content -->
                                    <!-- Tab Bar -->
                                   
                                    <!-- End Tab Bar -->
                                </div>
                                <!-- End Shop Product Tab Area -->
                            </div>
                            <!-- End Shop Product View -->
                        </div>
                    </div>
                </div>
            </div>
            <!--shop-product-area-end-->
          
             <?php include 'includes/footer.php';?>