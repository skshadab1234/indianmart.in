<?php 
include('top.php');
$msg="";
$shop_name="";
$owner_name="";
$retailer_email="";
$retailer_password="";
$id="";
$status = "";
$image_required = "required";
if(isset($_GET['id']) && $_GET['id']>0){
  $image_required = "";
    $id=get_safe_value($_GET['id']);
      $row=mysqli_query($con,"select * from retailers where id='$id'");
      $update_retailer = mysqli_fetch_assoc($row);
      $shop_name = $update_retailer['shop_name'];
      $owner_name = $update_retailer['owner_name'];
      $retailer_email = $update_retailer['retailer_email'];
      $retailer_img = $update_retailer['retailer_img'];
      $retailer_password = password_hash($update_retailer['retailer_password'],PASSWORD_BCRYPT);
      $status = $update_retailer['status'];

}

if(isset($_POST['retailer'])){
  $shop_name=get_safe_value($_POST['shop_name']);
  $owner_name=get_safe_value($_POST['owner_name']);
  $retailer_email=get_safe_value($_POST['retailer_email']);
  $retailer_password = password_hash($_POST['retailer_password'],PASSWORD_BCRYPT);
  // $status=get_safe_value($_POST['status']);
  $added_on=date('Y-m-d h:i:s');
  
  $retailer_img = $_FILES['retail']['name'];
     if (!empty($retailer_img)) {
        $profile = time().'_'.$retailer_img;
     $target = "../media/retailers/".$profile;
     move_uploaded_file($_FILES['retail']['tmp_name'], $target);
     $retailer_img = $profile;
     }else{
      $retailer_img = $update_retailer['retailer_img'];
     }


  if($id==''){
    $sql="select * from retailers where shop_name='$shop_name'";
  }else{
    $sql="select * from retailers where shop_name='$shop_name' and id!='$id'";
  } 
  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
    $msg="Shop Name already taken";
  }else{
    if($id==''){
      mysqli_query($con,"insert into retailers(shop_name,owner_name,retailer_email,retailer_password,status,retailer_img,added_on) values('$shop_name','$owner_name','$retailer_email','$retailer_password',1,'$retailer_img','$added_on')");
    }else{
      mysqli_query($con,"update retailers set shop_name='$shop_name', owner_name='$owner_name' , retailer_email='$retailer_email',  retailer_password='$retailer_password', status='$status', retailer_img = '$retailer_img' where id='$id'");
    }
    
    redirect('retailers.php');
  }
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
                        <h1 class="m-0 text-dark">Manage Retailers :- <?= $shop_name ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Retailers</li>
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

          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Retailer Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action=""  enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shop Name</label>
                    <input type="text" name="shop_name" class="form-control" id="exampleInputEmail1" value="<?= $shop_name ?>" placeholder="Enter shop name">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Owner Name</label>
                    <input type="text" name="owner_name" class="form-control" id="exampleInputEmail1" value="<?= $owner_name ?>" placeholder="Enter Owner name">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="retailer_email" class="form-control" id="exampleInputEmail1" value="<?= $retailer_email ?>" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="retailer_password" class="form-control" id="exampleInputPassword1" value="<?= $retailer_password ?>" placeholder="Password">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="retail"  class="form-control" <?= $image_required ?> >
                  </div>
                  <div class="form-group" style="background-image: url(<?= SITE_RETAIL_IMAGE.$retailer_img ?>);background-repeat: no-repeat;background-size: contain;width: 40px;height: 40px">
                    
                  </div>
                  <hr>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="retailer" class="btn btn-primary">Update</button>
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