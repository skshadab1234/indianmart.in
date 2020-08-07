<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	
  $sql="select * from user where id= '$id' order by id desc";
$res=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);

	if($type=='edit'){
    if (isset($_POST['update_user'])) {
      $username = get_safe_value($_POST['name']);
      $email = get_safe_value($_POST['email']);
      $mobile = get_safe_value($_POST['phone']);
      $password = get_safe_value($_POST['password']);
      $new_password=password_hash($password,PASSWORD_BCRYPT);

      $sql = mysqli_query($con,"update user set name='$username', email= '$email', mobile = '$mobile', password = '$new_password' where id = '$id'");
      redirect("user.php");
    }
  }
		
	}


$sql="select * from user order by id desc";
$res=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Admin Panel</title>
      <style type="text/css">
         :root {
         --borderWidth: 7px;
         --height: 24px;
         --width: 12px;
         --borderColor: #78b13f;
         }
         .check {
         display: inline-block;
         transform: rotate(45deg);
         height: var(--height);
         width: var(--width);
         position: absolute;
         right: 10px;
         border-bottom: var(--borderWidth) solid var(--borderColor);
         border-right: var(--borderWidth) solid var(--borderColor);
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
                        <h1 class="m-0 text-dark">Update <?= $row['name'] ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Customer</li>
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
                        <div class="row">
          <div class="col-md-12">

            <div class="card card-danger">
              <div class="card-body">
                <form method="post">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Name :- </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                  <label>Email :- </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                 <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                  <label>Password :- </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" value="<?= $row['password'] ?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Mobile Numbaer:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="phone" value="<?= $row['mobile'] ?>">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

<button type="submit" name="update_user" class="btn  btn-outline-primary">Update</button>
</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
               </div>

</div>                              <!-- /.table-responsive -->
                     
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
      </div>
  </div>
      <!-- ./wrapper -->
   </body>
</html>