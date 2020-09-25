<?php include 'includes/header.php';?>

<style type="text/css">


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
</style>
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
            <li class="shop-pro">Help Center</li>
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
      <form class="form-horizontal" id="query_form" method="post">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">User info</h4>
          </div>
          <div class="panel-body">

            <div class="form-group">
              <label class="col-sm-2 control-label">Full Name</label>
              <div class="col-sm-10">
                <input required="" id="user_name_name" name="user_name" type="text" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input required="" id="user_email" name="user_email" type="text" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Phone Number</label>
              <div class="col-sm-10">
                <input required="" name="user_phone" id="user_phone" type="text" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">Help / Query</h4>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Query Type</label>
              <div class="col-sm-10">
                <select required="" id="query_type" name="query_type" class="form-control">
                  <option selected="">Select</option>
                  <option value="Order Information">Order Information</option>
                  <option value="Random Information">Random Information</option>
                  <option value="Requests">Requests</option>
                  <option value="others">Others</option>
                </select>
                <input id="query_input" type="hidden" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Query</label>
              <div class="col-lg-6">
                <textarea required="" name="query_detail" id="query_detail" rows="6" cols="100" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6 col-sm-offset-2">
                <div id="contact_alert" class=" form-group alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong id="head"></strong><p id="title"></p>
                </div>
                <button type="submit" name="add_query" id="add_query" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end-my-account-area -->

<?php include 'includes/footer.php';?>