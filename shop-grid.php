<?php include 'includes/header.php';?>
   <!--start-single-heading-banner-->
   <div class="single-banner-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="single-ban-top-content">
                    <p>Shop grid</p>
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
                        <li class="shop-pro">Products</li>
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
                    <h2>Products Options</h2>
                </div>
                <!-- Shop-Layout-start -->
                <div class="left-sidebar">
                    <div class="shop-layout">
                        <div class="layout-title">
                            <h2>Main Categories</h2>
                        </div>
                        <div class="layout-list">
                            <ul>
                                <?php $rows = categories_count();
                                foreach ($rows as $row){ ?>
                                    <li><a href="#products" onclick="show_category_products(<?php echo $row['main_category_id'] ?>)"  title="<?php echo $row['main_category_name'] ?>"><?php echo $row['main_category_name'] ?></a><span>(<?php echo $row['count'] ?>)</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-layout">
                        <div class="layout-title">
                            <h2>Sub Categories</h2>
                        </div>
                        <div class="layout-list">
                            <ul>
                                <?php $rows = sub_categories_count();
                                foreach ($rows as $row){ ?>
                                    <li><a href="#products" onclick="show_sub_category_products(<?php echo $row['sub_category_id'] ?>)"  title="<?php echo $row['sub_category_name'] ?>"><?php echo $row['sub_category_name'] ?></a><span>(<?php echo $row['count'] ?>)</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Shop-Layout-end -->
                    <!-- Price-Filter-start -->
                    <div class="price-filter-area shop-layout">
                        <div class="price-filter">
                            <div class="layout-title">
                                <h2>Price</h2>
                            </div>
                            <p>
                              <label class="range-text">Range:</label>
                              <input type="text" style="border:0; color:#f6931f; font-weight:bold;" readonly="" id="amount">
                          </p>
                          <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span></div>
                          <button class="btn btn-default">show</button>
                      </div>
                  </div>
                  <!-- Price-Filter-end -->
                  <!-- Shop-Layout-start -->
                  <div class="shop-layout">
                    <div class="layout-title">
                        <h2>Techniques</h2>
                    </div>
                    <div class="layout-list">
                        <ul>
                            <li><a href="#">Embroidery</a><span>(2)</span></li>
                            <li><a href="#">Screen Printing</a><span>(2)</span></li>
                            <li><a href="#">Holographic</a><span>(1)</span></li>
                            <li><a href="#">Sublimation</a><span>(2)</span></li>

                        </ul>
                    </div>
                </div>
                <!-- Shop-Layout-end -->

            </div>
            <!-- End-Left-Sidebar -->


        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <!-- Shop-Product-View-start -->
            <div class="shop-product-view">
                <!-- Shop Product Tab Area -->
                <div class="product-tab-area">
                    <!-- Tab Bar -->
                    <div class="tab-bar">
                        <div class="tab-bar-inner">
                            <ul role="tablist" class="nav nav-tabs">
                                <!-- Aqib -->
                                <li class="active"><a title="Grid" data-toggle="tab" href="#shop-product"><i class="fa fa-th-large"></i><span class="grid" title="Grid">Grid</span></a></li>
                                <li><a  title="List" data-toggle="tab" href="#shop-list"><i class="fa fa-list"></i><span class="list">List</span></a></li>
                            </ul>
                        </div>
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="sort-by">
                                    <label class="sort-none">Sort By</label>
                                    <select>
                                        <option value="position">Position</option>
                                        <option value="name">Name</option>
                                        <option value="price">Price</option>
                                    </select>
                                    <a class="up-arrow" href="#"><i class="fa fa-long-arrow-up"></i></a>
                                </div>
                            </div>
                            <div class="pager-list">
                                <div class="limiter">
                                    <label>Show</label>
                                    <select>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                    per page
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End-Tab-Bar -->
                    <!-- Tab-Content -->
                    <div class="tab-content">
                        <!-- Shop Product-->
                        <div id="shop-product" class="tab-pane active">
                            <div class="row " id="grid_products">
                                <!-- Ajax Call (products_website.php) -->
                            </div>
                        </div>
                        <!-- Shop List -->
                        <div id="shop-list" class="tab-pane">
                            <!-- start-Single-Shop-list-->
                            <div class="single-shop">
                                <div class="row " id="list_products">
                                    <!-- Ajax Call (products_website.php) -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                    <!-- Tab Bar -->
                    <div class="tab-bar tab-bar-bottom">
                        <div class="tab-bar-inner">
                            <ul role="tablist" class="nav nav-tabs">
                                <li class="active"><a title="Grid" data-toggle="tab" href="#shop-product"><i class="fa fa-th-large"></i><span class="grid" title="Grid">Grid</span></a></li>
                                <li><a title="List" data-toggle="tab" href="#shop-list"><i class="fa fa-list"></i><span class="list">List</span></a></li>
                            </ul>
                        </div>
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="sort-by">
                                    <label class="sort-none">Sort By</label>
                                    <select>
                                        <option value="position">Position</option>
                                        <option value="name">Name</option>
                                        <option value="price">Price</option>
                                    </select>
                                    <a class="up-arrow" href="#"><i class="fa fa-long-arrow-up"></i></a>
                                </div>
                            </div>
                            <div class="pages">
                                <strong>Page:</strong>
                                <ol>
                                    <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#" title="Next"><i class="fa fa-arrow-right"></i></a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
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