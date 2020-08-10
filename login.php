<?php
session_start();
include('database.inc.php');
include('function.inc.php');
if(isset($_SESSION['RETAIL_ID'])){
  redirect("index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - Seller</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admin/assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this admin/page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin/assets/css/style.css">

</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo text-center">
                <h3>Login with <?php if (isset($_GET['loginwithpassword'])) {
                  echo "Password";
                }else{
                  echo "OTP";
                } ?></h3>
              </div>
              <form class="pt-3" method="post" >
               <?php
                if (isset($_GET['loginwithpassword'])) {
                  ?>
                <div class="form-group ">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" required>
                  <span id="email_error" class="field_error"></span>
                </div>
              
              <div class="form-group ">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                </div>
                <div class="mt-3 ">
                  <input type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="password_login()" value="Login" />
                </div>
                <div class="container" style="margin-top: 10px">
                  <span id="password_error" style="color: red" class="field_error"></span>
                <span style="color:green" id="success_field"></span>
                </div>
                  <?php
                }else{
                  ?>
                   <div class="form-group first_box">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Enter Email" required>
                  <span id="email_error" class="field_error"></span>
                </div>
              
                <div class="mt-3 first_box">
                  <input type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="send_otp()" value="Send OTP" />
                </div>

                <div class="form-group second_box" >
                  <input type="textbox" class="form-control form-control-lg" id="otp" placeholder="Enter OTP"  required>
                  <span id="otp_error" class="field_error"></span>
                </div>
                <div class="mt-3 second_box">
                  <input type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="submit_otp()" value="Submit Otp"/>
                </div>

                  <?php
                }
               ?>
                
              </form>
          
          <div class="container-fluid"  style="margin-top: 20px"> 
              <p><small><a href="<?php
              if(isset($_GET['loginwithpassword'])){
                echo "login.php";
              }else{
                echo "?loginwithpassword";
              }

               ?>">Login With <?php
                if (isset($_GET['loginwithpassword'])) {
                  echo "OTP";
                }else{
                  echo "Password";
                }
               ?></a></small></p>
             <small style="font-size: 12px">Not a seller ?  <a href="signup.php" >Create account</a> </small>
          </div>

            </div>
           
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<script>
function send_otp(){
  var email=jQuery('#email').val();
  jQuery.ajax({
    url:'send_otp.php',
    type:'post',
    data:'email='+email,
    success:function(result){
      if(result=='yes'){
        jQuery('.second_box').show();
        jQuery('#email_error').html('Please Wait......')
        jQuery('.first_box').hide();
      }
      if(result=='not_exist'){
        jQuery('#email_error').html('Please enter valid email');
      }
    }
  });
}

function submit_otp(){
  var otp=jQuery('#otp').val();
  jQuery.ajax({
    url:'check_otp.php',
    type:'post',
    data:'otp='+otp,
    success:function(result){
      if(result=='yes'){
        window.location='index.php';
      }
      if(result=='not_exist'){
        jQuery('#otp_error').html('Please enter valid otp');
      }
    }
  });
}

function password_login() {
  var email = jQuery('#email').val();
  var password=jQuery('#password').val();
  jQuery(".btn-primary").html("Loading");
  jQuery.ajax({
    url: "password_verify.php",
    type: "post",
    data: {email:email,password:password},
    success:function(result) {
     var data=jQuery.parseJSON(result);
     if (data.status=='error') {
        jQuery('#'+data.field).html(data.msg);
     }
     if (data.status=='success') {
        jQuery('#'+data.field).html(data.msg);
        jQuery(".btn-primary").attr('disabled',true);
        jQuery('#'+data.field).html('');
        window.location="index.php";
     }
    }
  });
}

</script>

  <style type="text/css">
    .second_box{display:none;}
.field_error{color:red;}
  </style>
  <!-- plugins:js -->
  <script src="admin/assets/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="admin/assets/js/Chart.min.js"></script>
  <script src="admin/assets/js/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="admin/assets/js/off-canvas.js"></script>
  <script src="admin/assets/js/hoverable-collapse.js"></script>
  <script src="admin/assets/js/template.js"></script>
  <script src="admin/assets/js/settings.js"></script>
  <script src="admin/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html>