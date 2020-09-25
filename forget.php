<?php include 'includes/header.php';?>
<?php
if (isset($_POST['submit']))
{
  if(isset($_POST['user_email']))
  {
    $user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
    $query = "SELECT * FROM `users` WHERE user_email='$user_email';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0)
    {
            //$row = mysqli_fetch_assoc($result);
      $token = uniqid(md5(time()));
      $query = "UPDATE `users` SET token = '$token' WHERE user_email = '$user_email'; ";
      if (mysqli_query($conn, $query))
      {
        $to=$user_email;
        $unyxa_email = 'info@unyxa.com';
        $message = 'Password Reset Request';
        $headers='';
        $headers .= "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8"."\r\n";
        $headers .= "From: ";
        $headers .= '<info@unyxa.com>'."\r\n";
        $ms ='';
        $ms .='  
        <!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #f1f1f1; margin: 0 auto; padding: 0; height: 100%; width: 100%;">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="x-apple-disable-message-reformatting">
        <title></title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <style>
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
          u ~ div .email-container {
            min-width: 320px !important;
          }
        }
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
          u ~ div .email-container {
            min-width: 375px !important;
          }
        }
        @media only screen and (min-device-width: 414px) {
          u ~ div .email-container {
            min-width: 414px !important;
          }
        }
        </style>

        <!-- CSS Reset : END -->

        <!-- Progressive Enhancements : BEGIN -->
        <style>
        @media screen and (max-width: 500px) {}
        </style>


        </head>

        <body width="100%" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #f1f1f1; font-family: Lato, sans-serif; font-weight: 400; font-size: 15px; line-height: 1.8; color: rgba(0,0,0,.4); mso-line-height-rule: exactly; background-color: #f1f1f1; margin: 0 auto; height: 100%; width: 100%; padding: 0;">
        <center style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width: 100%; background-color: #f1f1f1;">
        <div style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <div style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; max-width: 600px; margin: 0 auto;" class="email-container">
        <!-- BEGIN BODY -->
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0; border-collapse: collapse; table-layout: fixed; margin: 0 auto;">
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <td valign="middle" class="hero bg_white" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #ffffff; position: relative; z-index: 0; padding: 3em 0 2em 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
        <img src="../images/logo/logo.png" alt="" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; -ms-interpolation-mode: bicubic; width: 300px; max-width: 600px; height: auto; margin: auto; display: block;" width="300">
        </td>
        </tr><!-- end tr -->
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <td valign="middle" class="hero bg_white" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #ffffff; position: relative; z-index: 0; padding: 2em 0 4em 0; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
        <table style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0; border-collapse: collapse; table-layout: fixed; margin: 0 auto;">
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <td style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
        <div class="text" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: rgba(0,0,0,.3); padding: 0 2.5em; text-align: center;">
        <h2 style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-family: Lato, sans-serif; margin-top: 0; color: #000; font-size: 40px; margin-bottom: 0; font-weight: 400; line-height: 1.4;">Password Reset Request</h2>
        <h3 style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-family: Lato, sans-serif; color: #000000; margin-top: 0; font-size: 24px; font-weight: 300;">Click the reset button below to reset your Unyxa Password.</h3>
        <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"><a href="#" class="btn btn-primary" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-decoration: none; padding: 10px 15px; display: inline-block; border-radius: 5px; background: #30e3ca; color: #ffffff;">Reset Pssword</a></p>
        </div>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0; border-collapse: collapse; table-layout: fixed; margin: 0 auto;">
        <tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <td class="bg_light" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #fafafa; text-align: center; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" align="center">
        <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">2020 © Unyxa International</p>
        </td>
        </tr>
        </table>
        </div>
        </center>

        </body>
        </html>
        ';
        if (mail($to,$message,$ms,$headers))
        {

          $msg = '<div class=" alert alert-success  alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success! </strong>Password Reset Link has been sent to the email.
          </div>';
        }
      }

    }
    else
    {
      $msg = '<div class=" alert alert-success  alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Failed! </strong>User Email Not Exists.
      </div>';
    }
  } 
}

?>


<!-- <style type="text/css">


  body{
    margin-top:20px;
    background:#f5f5f5;
  }
/**
 * Panels
 */
 /*** General styles ***/
 .panel {
  box-shadow: none;
}
.panel-heading {
  border-bottom: 0;
}
.panel-title {
  font-size: 17px;
}
.panel-title > small {
  font-size: .75em;
  color: #999999;
}
.panel-body *:first-child {
  margin-top: 0;
}
.panel-footer {
  border-top: 0;
}

.panel-default > .panel-heading {
  color: #333333;
  background-color: transparent;
  border-color: rgba(0, 0, 0, 0.07);
}

form label {
  color: #999999;
  font-weight: 400;
}

.form-horizontal .form-group {
  margin-left: -15px;
  margin-right: -15px;
}
@media (min-width: 768px) {
  .form-horizontal .control-label {
    text-align: right;
    margin-bottom: 0;
    padding-top: 7px;
  }
}

.profile__contact-info-icon {
  float: left;
  font-size: 18px;
  color: #999999;
}
.profile__contact-info-body {
  overflow: hidden;
  padding-left: 20px;
  color: #999999;
}
.profile-avatar {
  width: 200px;
  position: relative;
  margin: 0px auto;
  margin-top: 196px;
  border: 4px solid #f3f3f3;
}
</style> -->
<!--start-single-heading-banner-->
<div class="single-banner-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <div class="single-ban-top-content">
          <p>My Account</p>
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
            <li class="shop-pro">Forget Password</li>
          </ul>
        </div>
      </div>
      <!--end-shop-head-->
    </div>
  </div>
</div>
<!--end-single-heading-->
<!--start-my-account-area -->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdeys">
  <div class="row">
    <div class="col-xs-12 col-sm-12">
       <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="text-dark text-xl-center">Password Recovery</h4>
        </div>
        <div class="panel-body">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="login-form col-12 col-sm-7">
            <div class="form-group mb-3">
              <label for="emailaddress">Email Address</label>
              <input class="form-control" type="email" id="emailaddress" name="user_email" required="" placeholder="Enter your email">
            </div>
            <?php if (isset($msg)) {echo $msg;} ?>
            <div class="form-group mb-0">
              <button class="btn btn-primary" type="submit" name="submit"> Reset Password </button>
            </div>
            <div class=" form-group mt-2">Remeber Password? <a href="login.php">Login</a></div>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>
</div>
</div>
<!--end-my-account-area -->

<?php include 'includes/footer.php';?>