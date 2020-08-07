<?php 
include('top.php');
  $id = $admin['id'];
if (isset($_POST['update_admin'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

   $filename = $_FILES['profile']['name'];
   if (!empty($filename)) {
      $profile = time().'_'.$filename;
   $target = "../media/userprofile/".$profile;
   move_uploaded_file($_FILES['profile']['tmp_name'], $target);
   $filename = $profile;
   }else{
    $filename = SITE_USER_IMAGE.  $admin['photo'];
   }
  
  $row =   mysqli_query($con,"UPDATE admin SET email='$email', password='$password', name='$name', username='$username', photo='$filename' WHERE id='$id'");
    redirect("myaccount.php");

} 

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <style type="text/css">
        
:root {
  --primary: #323232;
  --light-bg: #f4f4f4;
  --border: #eee;
}


.card1 {
  width: 100%;
  background-color: #fff;
  padding: 3rem;
}

.card__header {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-top: -15px;
}

.card__profile img {
  border-radius: 50%;
  height: 5rem;
  width: 5rem;
  -o-object-fit: cover;
     object-fit: cover;
}

.card__name {
  margin-left: 1.25rem;
}

.card__handle {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-top: 3px;
}

.card__button svg {
  height: 1.05rem;
  width: 1.05rem;
  margin-right: 5px;
}

.card__button {
  margin-left: auto;
}

.card__button button {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  font-size: 1.05rem;
  background-color: var(--primary);
  color: white;
  font-weight: bold;
  border: none;
  height: 40px;
  width: 100px;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  cursor: pointer;
}

.card__button button:active {
  -webkit-transform: scale(0.96);
          transform: scale(0.96);
}

.card__heading {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

span.circle {
  height: 3px;
  width: 3px;
  background-color: var(--primary);
  border-radius: 50%;
  display: inline-block;
  margin: 0 8px;
}

.border {
  border-radius: 5px;
  height: 2px;
  background-color: var(--border);
  border: none;
  margin: 1.25rem 0;
}
@media (max-width: 740px) {
  .card1 {
    width: 100%;
  }

}

@media (max-width: 545px) {
  .card__button button {
    width: 40px;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
  }
  .card__button button span {
    display: none;
  }
  .card__button button i {
    margin-right: 0;
  }
}



      </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
      <div class="wrapper">
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Account Details</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">myaccount</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <?php 
                    if (isset($_GET['update'])) {
                      ?>
                            <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Profile Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action=""  enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?= $admin['name'] ?>" placeholder="Enter Name">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="<?= $admin['username'] ?>" placeholder="Enter Username">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?= $admin['email'] ?>" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?= $admin['password'] ?>" placeholder="Password">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="profile" class="form-control" >
                  </div>
                  <hr>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="update_admin" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
                      <?php
                    }else{
                      ?>
    <div class="card1">
      <div class="card__header">
        <div class="card__profile">
          <img
            src="<?= SITE_USER_IMAGE.$admin['photo'] ?>"
            alt="Admin Profile"
          />
        </div>
        <div class="card__name">
          <h2><?= $admin['username'] ?></h2>
          <div class="card__handle">
            <span class="handle"><?= $admin['email'] ?></span>
            <span class="circle"></span>
            <span class="category" style="color: green">Online</span>
          </div>
        </div>
        <div class="card__button">
          <a href="myaccount.php?update"><button>
            <i class="fa fa-edit"></i>
            <span>&nbsp; Edit</span>
          </button></a>
        </div>
      </div>
      <hr class="border" />
    </div>
                      <?php
                    }
                  ?>
               </div>
    <!-- /.table-responsive -->
                     
               <!--/. container-fluid -->
            </section>
            <!-- /.content -->
         <!-- /.content-wrapper -->
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->

         <?php include 'footer.php'; ?>
                 <script src="template_admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="template_admin/plugins/jquery-validation/additional-methods.min.js"></script>
         <script type="text/javascript">
           $(document).ready(function () {

  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
         </script>
      </div>
  </div>
      <!-- ./wrapper -->
   </body>
</html>