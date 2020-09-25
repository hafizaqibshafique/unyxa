<?php include 'includes/header.php';?>


<!--start-single-heading-banner-->
<div class="single-banner-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">
        <div class="single-ban-top-content">
          <p>Register</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end-single-heading-banner-->
<!--start-single-heading-->
<div class="signle-heading login-m">
  <div class="container">
    <div class="row">
      <!--start-shop-head -->
      <div class="col-lg-12">
        <div class="shop-head-menu">
          <ul>
            <li><i class="fa fa-home"></i><a class="shop-home" href="index.php"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
            <li class="shop-pro">Register</li>
          </ul>
        </div>
      </div>
      <!--end-shop-head-->
    </div>
  </div>
</div>
<!--end-single-heading-->
<!-- login-area start -->
<div class="login-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="login-content banner-r-b">
          <h2 class="login-title">Register</h2>
          <p>Hello,Welcome to your account registration</p>
          <form method="post" id="registration_form">
           <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <div class="form-group">
                 <label for="user_name">First Name</label>
                 <input required="" id="user_name" minlength="3" maxlength="40" placeholder="Enter First Name" name="user_name" type="text" title="Enter Name" />
                 <b class="text-danger " id="name_error"></b>
               </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <div class="form-group">
                <label for="user_email">Last Name</label>
                <input required="" type="text" id="user_last_name" name="user_last_name" placeholder="Enter Last Name" />
                <b class="text-danger " id="last_name_error"></b>
              </div>
            </div>
          </div>
           <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <div class="form-group">
                 <label for="user_phone">Phone</label>
                 <input required="" id="user_phone" minlength="3" maxlength="40" placeholder="1234-567-1234567" name="user_phone" type="text" title="Enter Your Phone Number" />
                 <b class="text-danger " id="phone_error"></b>
               </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
               <div class="form-group">
                <label for="user_email">Email</label>
                <input required="" type="mail" id="user_email" name="user_email" placeholder="example@domain.com" />
                <b class="text-danger " id="email_error"></b>
              </div>
            </div>
          </div>
          <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="form-group">
               <label for="user_address">Address</label>
               <input required="" placeholder="Enter Your Address(Used for Shipping)" type="text" name="user_address" id="user_address" />
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
             <div class="form-group">
               <label for="user_country">Country</label>
               <input required="" placeholder="Enter Country" type="text" name="user_country" id="user_country" />
               <b class="text-danger " id="country_error"></b>
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="form-group">
              <label for="user_city">City</label>
              <input required="" placeholder="Enter City" type="text" name="user_city" id="user_city" />
            </div>
          </div>
        </div>
        <div class="row">
           <div class="form-group col-lg-6">
             <label for="user_password">Password</label>
             <div class="input-group col-lg-12" >
             <input required="" minlength="6" class="form-control border-right-0 psw" type="password" id="user_password"  name="user_password" />
             <div class="input-group-btn ">
               <span  toggle=".psw" class="btn toggle-password"><i class="fa fa-eye eye "></i></span>
             </div>
             <b class="text-danger " id="password_error"></b>
           </div>
           </div>
           <div class="form-group col-lg-6">
             <label for="confirm_password">Confirm Password</label>
             <div class="input-group col-lg-12" >
             <input required="" minlength="6" class="form-control border-right-0 psw" type="password"  name="confirm_password" id="confirm_password"/>
             <div class="input-group-btn ">
               <span  toggle=".psw" class="btn toggle-password"><i class="fa fa-eye eye "></i></span>
             </div>
             <b class="text-danger " id="password_error"></b>
           </div>
           </div>

           <div class="form-group">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div id="register_alert" class=" form-group alert alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong id="b"></strong><p id="t"></p>
              </div>
             <div class="form-group">
               <input class="login-sub align-self-center" id="register_user" name="register_user" type="submit" value="Register" />

             </div>
           </div>
         </div>
       </div>

     </form>
   </div>
 </div>
</div>
</div> 
</div>
<!-- login-area end -->
<!--Start-brand-area-->
<div class="brands-area login-brand">
  <div class="container">
    <!--barand-heading-->
    <div class="brand-heading text-center">
      <h2>Popular brands</h2>
    </div>
    <!--brand-heading-end-->
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="brands-carousel">
          <!--start-single-brand-->
          <div class="single-brand">
            <a href="#"><img src="images/brands/1.png" alt=""></a>
          </div>
          <!--end-single-brand-->
          <!--start-single-brand-->
          <div class="single-brand">
            <a href="#"><img src="images/brands/2.png" alt=""></a>
          </div>
          <!--end-single-brand-->
          <!--start-single-brand-->
          <div class="single-brand">
            <a href="#"><img src="images/brands/3.png" alt=""></a>
          </div>
          <!--end-single-brand-->
          <!--start-single-brand-->
          <div class="single-brand">
            <a href="#"><img src="images/brands/4.png" alt=""></a>
          </div>
          <!--end-single-brand-->
          <!--start-single-brand-->
          <div class="single-brand">
            <a href="#"><img src="images/brands/1.png" alt=""></a>
          </div>
          <!--end-single-brand-->
          <!--start-single-brand-->
          <div class="single-brand">
            <a href="#"><img src="images/brands/2.png" alt=""></a>
          </div>
          <!--end-single-brand-->
          <!--start-single-brand-->
          <div class="single-brand">
            <a href="#"><img src="images/brands/3.png" alt=""></a>
          </div>
          <!--end-single-brand-->
        </div>
      </div>
    </div>
  </div>
</div>
<!--End-brand-area-->
<?php include 'includes/footer.php';?>