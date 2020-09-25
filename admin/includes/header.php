<?php
session_start();
include './config/db.php'; 
include_once './functions/functions.php';
if(isset($_SESSION['user_name']))
{
    if((time() - $_SESSION['last_login_timestamp']) > 500) 
    {
        header("Location: logout.php");
    }  
    else
    {
        $_SESSION['last_login_timestamp'] = time(); 
    } 
}
else
{
    header("Location: login.php");
    exit;
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
<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->

<!-- Mirrored from html.designstream.co.in/pick/html/layout-horizontal-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Aug 2020 08:42:06 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Unyxa | Admin Panel </title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet"  href="dist/vendors/chartjs/Chart.min.css">
    <!-- END: Page CSS-->




    <!-- START: Page CSS-->
    <link rel="stylesheet" href="dist/vendors/morris/morris.css">
    <link rel="stylesheet" href="dist/vendors/weather-icons/css/pe-icon-set-weather.min.css">
    <link rel="stylesheet" href="dist/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="dist/vendors/starrr/starrr.css">
    <link rel="stylesheet" href="dist/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="dist/vendors/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <link rel="stylesheet" href="dist/css/select2.min.css">


    <!-- END: Custom CSS-->

</head>
<!-- END Head-->

<!-- START: Body-->
<body id="main-container" class="default dark horizontal-menu">

    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <div class="loader"></div>
    </div>
    <!-- END: Pre Loader-->

    <!-- START: Header-->
    <div id="header-fix" class="header fixed-top">
        <div class="site-width">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                    <a href="index.php" class="horizontal-logo text-left">
                       <span class="h4 font-weight-bold align-self-center mb-0 ml-auto">Unyxa</span>
                   </a>
               </div>
               <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
            </div>

            <form class="float-left d-none d-lg-block search-form">
                <div class="form-group mb-0 position-relative">
                    <input type="text" class="form-control border-0 rounded bg-search pl-5" placeholder="Search anything...">
                    <div class="btn-search position-absolute top-0">
                        <a href="#"><i class="h6 icon-magnifier"></i></a>
                    </div>
                    <a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown" aria-expanded="false"><i class="icon-close h5"></i>
                    </a>

                </div>
            </form>
            <div class="navbar-right ml-auto h-100">
                <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                    <li class="d-inline-block align-self-center  d-block d-lg-none">
                        <a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>
                        </a>
                    </li>

                    <li class="dropdown align-self-center">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-reload h4"></i>
                            <span class="badge badge-default"> <span class="ring">
                            </span><span class="ring-point">
                            </span> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right border  py-0">
                            <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="#">
                                    <div class="media">
                                        <img src="dist/images/author.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle">
                                        <div class="media-body">
                                            <p class="mb-0">john</p>
                                            <span class="text-success">New user registered.</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li><a class="dropdown-item text-center py-2" href="#"> See All Tasks <i class="icon-arrow-right pl-2 small"></i></a></li>
                        </ul>

                    </li>
                    <li  class="dropdown align-self-center d-inline-block">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-bell h4"></i>
                            <span class="badge badge-default"> <span class="ring notification">
                            </span><span class="ring-point unread">
                            </span> </span>
                        </a>
                        <ul id="messages" class="dropdown-menu dropdown-menu-right border   py-0">
                            <!-- <li>
                                <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="app-mail.php">
                                    <div class="media">
                                        <img src="dist/images/author.jpg" alt="" class="d-flex mr-3 img-fluid rounded-circle w-50">
                                        <div class="media-body">
                                            <p class="mb-0 text-success">Aqib</p>
                                            <p class="mb-0 text-primary">New message</p>
                                            <p class="mb-0 ">Appy for job</p>
                                            12 min ago
                                        </div>
                                    </div>
                                </a>
                            </li> -->
                            <!-- <li><a class="dropdown-item text-center py-2" href="app-mail.php"> Read All Message <i class="icon-arrow-right pl-2 small"></i></a></li> -->
                        </ul>
                    </li>
                    <li class="dropdown user-profile align-self-center d-inline-block">
                        <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                            <div class="media">
                                <img src="dist/images/author.jpg" alt="" class="d-flex img-fluid rounded-circle" width="29">
                            </div>
                        </a>

                        <div class="dropdown-menu border dropdown-menu-right p-0">
                            <a href="#myModal" data-toggle="modal" data-target="#myModal" class="dropdown-item px-2 align-self-center d-flex">
                                <span class="icon-pencil mr-2 h6 mb-0"></span> Edit Profile</a>

                                <a href="logout.php" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                    <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- END: Header-->

        <!-- START: Main Menu-->
        <div class="sidebar">
            <div class="site-width">

                <!-- START: Menu-->
                <ul id="side-menu" class="sidebar-menu">
                    <!-- <li class=""><a href="index.php"><i class="icon-home mr-1"></i> Dashboard</a></li> -->


                    <li class="dropdown"><a href="#"><i class="icon-organization mr-1"></i> Categories </a>
                        <ul>
                            <li class="dropdown"><a href="#"><i class="icon-options"></i>Main Categories</a>
                                <ul class="sub-menu">
                                    <li><a class="click" call_type="addmain" href="add"><i class="icon-energy"></i>Add Main Categories</a></li>
                                    <li><a href="editmain.php"><i class="icon-energy"></i>Edit Main Categories</a></li>
                                    <li><a href="view_main_categories.php"><i class="icon-energy"></i>View Main Categories</a></li>

                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><i class="icon-options"></i>Sub Categories</a>
                                <ul class="sub-menu">
                                    <li><a href="addsub.php"><i class="icon-energy"></i>Add Sub Categories</a></li>
                                    <li><a href="editsub.php"><i class="icon-energy"></i>Edit Sub Categories</a></li>
                                    <li><a href="view_sub_categories.php"><i class="icon-energy"></i>View Sub Categories</a></li>

                                </ul>
                            </li>


                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Products </a>
                        <ul>

                            <li><a href="addproduct.php"><i class="icon-tag"></i>Add Products</a></li>
                            <li><a href="editproduct.php"><i class="icon-tag"></i>Edit Products</a></li>
                            <li><a href="view_products.php"><i class="icon-tag"></i>View Products</a></li>

                        </ul>
                    </li>

                    <li class="dropdown "><a href="#"><i class="icon-organization mr-1"></i> Size Charts & Categories </a>
                        <ul >
                            <li class="dropdown"><a href="#"><i class="icon-options"></i>Chart Categories</a>
                                <ul class="sub-menu">
                                    <li><a href="addsizecat.php"><i class="icon-energy"></i>Add Chart Categories</a></li>
                                    <li><a href="view_chart_categories.php"><i class="icon-energy"></i>View Chart Categories</a></li>

                                </ul>
                            </li>
                            <li><a href="addsize.php"><i class="icon-energy"></i>Add Size Charts</a></li>
                            <li><a href="editsize.php"><i class="icon-energy"></i>Edit Size Charts</a></li>
                            <li><a href="view_size_charts.php"><i class="icon-energy"></i>View Size Charts</a></li>

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Testimonials </a>
                        <ul>

                            <li><a href="addtest.php"><i class="icon-tag"></i>Add Testimonials</a></li>
                            <li><a href="edittest.php"><i class="icon-tag"></i>Edit Testimonials</a></li>
                            <li><a href="view_testimonials.php"><i class="icon-tag"></i>View Testimonials</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Services </a>
                        <ul>

                            <li><a href="add_service.php"><i class="icon-tag"></i>Add Service</a></li>
                            <li><a href="edit_service.php"><i class="icon-tag"></i>Edit Service</a></li>
                            <li><a href="view_services.php"><i class="icon-tag"></i>View Services</a></li>

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Certificates </a>
                        <ul>

                            <li><a href="addcert.php"><i class="icon-tag"></i>Add Certificates</a></li>
                            <li><a href="editcert.php"><i class="icon-tag"></i>Edit Certificates</a></li>
                            <li><a href="view_certificates.php"><i class="icon-tag"></i>View Certificates</a></li>

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Gallery </a>
                        <ul>

                            <li><a href="addgallery.php"><i class="icon-tag"></i>Add Gallery</a></li>
                            <li><a href="editgallery.php"><i class="icon-tag"></i>Edit Gallery</a></li>
                            <li><a href="view_gallery.php"><i class="icon-tag"></i>View Gallery</a></li>

                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Orders </a>
                        <ul>

                            <li><a href="vieworders.php"><i class="icon-tag"></i>View Orders</a></li>


                        </ul>
                    </li>

                    <li class="dropdown"><a href="#"><i class="icon-layers mr-1"></i> Users </a>
                        <ul>

                            <li><a href="viewusers.php"><i class="icon-tag"></i>View Users</a></li>

                        </ul>
                    </li>

                </ul>
                <!-- END: Menu-->

            </div>
        </div>

        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <form   id="myform" >

                <div class="modal-content">


                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title card-title text text-primary">Update Account</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <div id="alerts" class=" alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong id="strong"> </strong><span id="txt"></span>
                            </div>


                            <?php //if (isset($msg)) {echo $msg;} ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email</label>
                            <input required="" type="email" name="email" class="form-control rounded" name="email" id="email" placeholder="Enter Email" value="<?php echo $_SESSION['user_email']; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="current_password">Current Password</label>
                            <input required="" type="password" class="form-control rounded" name="current_password" id="current_password" placeholder="Enter Current Password">
                        </div>
                   <div class="form-group col-md-6">
                    <label for="new_password">New Password</label>
                    <div class="input-group mb-3">
                        <input aria-describedby="new_password"  minlength="6" required="" type="password" name="new_password" class="form-control border-right-0 psw" id="new_password" placeholder="Enter New Password" >
                        <div class="input-group-prepend ">
                            <span  toggle=".psw" class="fa fa-eye input-group-text rounded border-left-0 eye toggle-password"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="comfirm_password">Confirm Password</label>
                    <div class="input-group mb-3">
                    <input minlength="6" type="password" name="confirm_password" class="form-control rounded psw border-right-0 " id="confirm_password" placeholder="Enter Current Password">
                    <div class="input-group-prepend">
                    <span  toggle=".psw" class="fa fa-eye input-group-text rounded border-left-0 eye toggle-password"></span>
                </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" name="update_account" id="update_account" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-danger" id="close_modal"  data-dismiss="modal">Close</button>
        </div>

    </div>
</form>
</div>

</div>

        <!-- END: Main Menu-->