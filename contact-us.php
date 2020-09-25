<?php include 'includes/header.php';?>
            <!--start-single-heading-banner-->
            <div class="single-banner-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="single-ban-top-content">
                                <p>Contact Us</p>
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
                                    <li class="shop-pro">Contact Us</li>
                                </ul>
                            </div>
                        </div>
                        <!--end-shop-head-->
                    </div>
                </div>
            </div>
            <!--end-single-heading-->
            <!--contact-map-area-start-->
            <div class="map-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="map-area">
                                <div id="googleMap" style="width:100%;height:410px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end-contact-map-area-->
            <!--stay_in_touch_area_start-->
            <div class="stay-touch-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <form id="contact_form" method="post">
                            <div class="touch-text">
                                <h3>Stay in touch</h3>
                            </div>
                            <div class="smal-text">
                                <p>Feel free to send us message any time about anything.</p>
                            </div>
                            <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="touch-form">
                                                    <lable for="user_name" class="name">Your Name (required)</lable>
                                                    <input  required="" id="user_name" minlength="3" maxlength="40" placeholder="Enter Your Name" name="user_name" type="text" title="Enter Name" ><br> 
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <div class="touch-form">
                                                    <lable for="user_email" class="name">Email (required)</lable>
                                                    <input  required="" id="user_email" minlength="3" maxlength="40" placeholder="example@domain.com" name="user_email" type="email" title="Enter Email" />
                                                    <b class="text-danger " id="email_error"></b> 
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="touch-form">
                                                   <lable for="user_phone" class="name">Your Phone (required)</lable>
                                                    <input minlength="3" maxlength="40" type="tel" name="user_phone" id="user_phone" placeholder="0012-123-4567890">
                                                    <b class="text-danger " id="phone_error"></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="touch-form">
                                         <lable for="user_subject" class="name">Subject (required)</lable>
                                         <input minlength="3" maxlength="100" type="text" name="user_subject" id="user_subject" placeholder="Ener Message Subject Here">
                                     </div>
                                 </div>
                             </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="touch-textarea">
                                                       <lable for="user_message" class="name">Your Message</lable>
                                                        <textarea required="" name="user_message" id="user_message" cols="89" rows="5"></textarea><br>
                                                    <div class="continue-butt">
                                                        <b class="text-danger " id="message_error"></b>
                                                        <input id="send_message" class="hvr-underline-from-left" type="submit" value="Send Message">
                                                    </div>
                                                    <div id="contact_alert" class=" form-group alert alert-danger alert-dismissible">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <strong id="head"></strong><p id="title"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    </form>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="address-area">
                                <div class="single-address">
                                    <p><i class="fa fa-map-marker"></i> <strong class="stro">Address :</strong><br> <span class="add-tex"> Qudoos Street, Jinnah Town<br> Defense Road, 51310, Sialkot, Pakistan</span></p>
                                </div>
                                <div class="single-email">
                                    <p><i class="fa fa-envelope-o"></i><strong class="emai-stro">Email :</strong><br> <span class="email-tex"> <a href="mailto:info@unyxa.com">info@unyxa.com</a></span></p>
                                </div>
                                <div class="customar-supp">
                                    <p><i class="fa fa-phone"></i> <strong class="cus-stro">customer support :</strong><br> <span class="cus-tex"> <a href="tel:+92 340 680 4923" style="color: black;">+92 340 680 4923</a></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--stay_in_touch_area_End-->
             <?php include 'includes/footer.php';?>