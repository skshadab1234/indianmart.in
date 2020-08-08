<?php
session_start();
include('database.inc.php');
include('function.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Signup - Seller</title>

  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/template_admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/template_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/template_admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body  class="hold-transition register-page">
 <div class="register-box">
  <div class="register-logo">
    <a href="javascript:"><b>Indian</b>kart <small style="font-size: 14px">Retailer</small>  </a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register as new membership</p>

      <form  method="post" name = "myForm" onsubmit = "return(validate());">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" id="name" placeholder="Full name" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          <span style="color:red;position: relative;color: red;top: -14px;font-style: italic;"  id="email_field"></span>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="repassword" placeholder="Retype password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          <span style="color:red" id="error_field"></span>
          <span style="color:green" id="success_field"></span>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" onclick="submit_reg()" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>


<script type="text/javascript">


 function submit_reg(){
  var name=jQuery('#name').val();
  var email=jQuery('#email').val();
  var password=jQuery('#password').val();
  var repassword=jQuery('#repassword').val();
  jQuery(".btn-primary").html("Loading");
  jQuery('#error_field').html("Please Wait......");
  jQuery.ajax({
    url:'register.php',
    type:'post',
    data:{email:email, name:name, password:password, repassword:repassword},
    success:function(result){
      jQuery(".btn-primary").html("Register");
      jQuery('#error_field').html("");
      jQuery('#email_field').html("");
      alert(result);
      var data=jQuery.parseJSON(result);
     if(data.status=='error'){
         jQuery('#'+data.field).html(data.msg);
      }else if(data.status == 'success'){
        jQuery('#'+data.field).html(data.msg);
        jQuery(".btn-primary").attr('disabled',true);

        
      }
    }
  });
}

</script>
  <!-- jQuery -->
<script src="admin/template_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/template_admin/dist/js/adminlte.min.js"></script>
</body>
</html>