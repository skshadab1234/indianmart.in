<?php 
include('top.php');
$msg="";
$seller_name="";
$seller_email="";
$seller_shop_name="";
$seller_password="";
$id="";
$image_required = "required";
if(isset($_GET['id']) && $_GET['id']>0){
  $image_required = "";
    $id=get_safe_value($_GET['id']);
      $row=mysqli_query($con,"select * from wholeseller where id='$id'");
      $update_seller = mysqli_fetch_assoc($row);
      $seller_name = $update_seller['seller_name'];
      $seller_email = $update_seller['seller_email'];
      $seller_shop_name = $update_seller['seller_shop_name'];
      $seller_password = password_hash($update_seller['seller_password'],PASSWORD_BCRYPT);
}

if(isset($_POST['seller'])){
  $seller_name=get_safe_value($_POST['seller_name']);
  $seller_email=get_safe_value($_POST['seller_email']);
  $seller_shop_name=get_safe_value($_POST['seller_shop_name']);
  $seller_password = password_hash($_POST['seller_password'],PASSWORD_BCRYPT);
  // $status=get_safe_value($_POST['status']);
  $added_on=date('Y-m-d h:i:s');
  
  $seller_img = $_FILES['seller']['name'];
     if (!empty($seller_img)) {
        $profile = time().'_'.$seller_img;
     $target = "../media/wholeseller/".$profile;
     move_uploaded_file($_FILES['seller']['tmp_name'], $target);
     $seller_img = $profile;
     }else{
      $seller_img = $update_seller['seller_img'];
     }


  if($id==''){
    $sql="select * from wholeseller where seller_email='$seller_email'";
  }else{
    $sql="select * from wholeseller where seller_email='$seller_email' and id!='$id'";
  } 
  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
    $msg="Shop Name already taken";
  }else{
    if($id==''){
      mysqli_query($con,"insert into wholeseller(seller_img,seller_name,seller_email,seller_password,seller_shop_name,status,added_on) values('$seller_img','$seller_name','$seller_email','$seller_password','$seller_shop_name',1,'$added_on')");
    }else{
      mysqli_query($con,"update wholeseller set seller_img='$seller_img', seller_name='$seller_name' , seller_email='$seller_email',  seller_password='$seller_password',seller_shop_name='$seller_shop_name' where id='$id'");
    }
    
    redirect('wholeseller.php');
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
                        <h1 class="m-0 text-dark">Manage Wholeseller :- <?= $seller_shop_name ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage wholeseller</li>
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
                <h3 class="card-title">Seller Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action=""  enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Seller Shop Name</label>
                    <input type="text" name="seller_shop_name" class="form-control" id="exampleInputEmail1" value="<?= $seller_shop_name ?>" placeholder="Enter shop name">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Seller Name</label>
                    <input type="text" name="seller_name" class="form-control" id="exampleInputEmail1" value="<?= $seller_name ?>" placeholder="Enter Owner name">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Seller Email</label>
                    <input type="email" name="seller_email" class="form-control" id="exampleInputEmail1" value="<?= $seller_email ?>" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Seller Password</label>
                    <input type="password" name="seller_password" class="form-control" id="exampleInputPassword1" value="<?= $seller_password ?>" placeholder="Password">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Seller Image</label>
                    <input type="file" name="seller"  class="form-control" <?= $image_required ?> >
                  </div>
                  <div class="form-group" style="background-image: url(<?= SITE_SELLER_IMAGE.$update_seller['seller_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 40px;height: 40px">
                    
                  </div>
                  <hr>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="seller" class="btn btn-primary">Update</button>
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