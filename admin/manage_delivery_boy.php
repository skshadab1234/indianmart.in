<?php 
include('top.php');
$msg="";
$name="";
$mobile="";
$password="";
$id="";
$new_password = "";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from delivery_boy where id='$id'"));
	$name=$row['name'];
	$password=$row['password'];
	$mobile=$row['mobile'];
	$new_password=password_hash($password,PASSWORD_BCRYPT);
}

if(isset($_POST['submit'])){
	$name=get_safe_value($_POST['name']);
	$password=get_safe_value($_POST['password']);
	$mobile=get_safe_value($_POST['mobile']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from delivery_boy where mobile='$mobile'";
	}else{
		$sql="select * from delivery_boy where mobile='$mobile' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Delivery boy already added";
	}else{
		if($id==''){
			
			mysqli_query($con,"insert into delivery_boy(name,password,mobile,status,added_on) values('$name','$new_password','$mobile',1,'$added_on')");
		}else{
			mysqli_query($con,"update delivery_boy set name='$name', password='$new_password' , mobile='$mobile' where id='$id'");
		}
		
		redirect('delivery_boy.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Manage Delivery Boy</title>
      <style type="text/css">
         :root {
         --borderWidth: 7px;
         --height: 24px;
         --width: 12px;
         --borderColor: #78b13f;
         }
         .check { required
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
                        <h1 class="m-0 text-dark">Manage Delivery Boy :- <?= $name ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Delivery Boy Master</li>
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
                    <input type="text" class="form-control" name="name" value="<?= $name ?>" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Password :- </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="password" class="form-control" name="password" value="<?= $password ?>" required>
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
                    <input type="text" class="form-control" name="mobile" value="<?= $mobile ?>" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

<button type="submit" name="submit" class="btn  btn-outline-primary">
	<?php
	if (isset($_GET['id'])) {
		echo "Update";
	}else{
		echo "Add";
	}

	 ?>


</button>
</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
               </div>

        
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
      </div>
  </div>
      <!-- ./wrapper -->
   </body>
</html>