<?php include 'includes/header2.php';
if (isset($_POST['submit']))
{
    if(isset($_POST['user_email']))
    {
        $user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
        $query = "SELECT * FROM `admin` WHERE user_email='$user_email';";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0)
        {
            //$row = mysqli_fetch_assoc($result);
            $token = uniqid(md5(time()));
            $query = "UPDATE `admin` SET token = '$token' WHERE user_email = '$user_email'; ";
            if (mysqli_query($conn, $query))
            {
                $to=$user_email;
                $unyxa_email = 'info@unyxa.com';
                $message = 'Reset Password';
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
                    <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                    <a href="http://unyxa.com/admin/password_reset.php?token='.$token.'" class="btn btn-primary" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-decoration: none; padding: 10px 15px; display: inline-block; border-radius: 5px; background: #30e3ca; color: #ffffff;">Reset Password</a></p>
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


<!-- START: Main Content-->
<div class="container">
    <div class="row vh-100 justify-content-between align-items-center">
        <div class="col-12">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row row-eq-height lockscreen   mt-5 mb-5">
                <div class="lock-image col-12 col-sm-5"></div>
                <div class="login-form col-12 col-sm-7">
                    <div class="form-group mb-3">
                        <label for="emailaddress">Email Address</label>
                        <input class="form-control" type="email" id="emailaddress" name="user_email" required="" placeholder="Enter your email">
                    </div>
                    <?php if (isset($msg)) {echo $msg;} ?>
                    <div class="form-group mb-0">
                        <button class="btn btn-primary" type="submit" name="submit"> Send New Password </button>
                    </div>

                    <div class="mt-2">Remeber Password? <a href="login.php">Login</a></div>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- END: Content-->

<?php include 'includes/footer2.php';?>
