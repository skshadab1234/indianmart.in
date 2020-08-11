<?php 
include('top.php');
$sid = $wholeseller['id'];
$msg="";
$coupon_code="";
$coupon_type="";
$coupon_value="";
$cart_min_value="";
$expired_on="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from coupon_code where id='$id'"));
	$coupon_code=$row['coupon_code'];
	$coupon_type=$row['coupon_type'];
	$coupon_value=$row['coupon_value'];
	$cart_min_value=$row['cart_min_value'];
	$expired_on=$row['expired_on'];
}

if(isset($_POST['submit'])){
	$coupon_code=get_safe_value($_POST['coupon_code']);
	$coupon_type=get_safe_value($_POST['coupon_type']);
	$coupon_value=get_safe_value($_POST['coupon_value']);
	$cart_min_value=get_safe_value($_POST['cart_min_value']);
	$expired_on=get_safe_value($_POST['expired_on']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from coupon_code where coupon_code='$coupon_code'";
	}else{
		$sql="select * from coupon_code where coupon_code='$coupon_code' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Coupon code already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into coupon_code(added_by,coupon_code,coupon_type,coupon_value,cart_min_value,expired_on,status,added_on) values('$sid','$coupon_code','$coupon_type','$coupon_value','$cart_min_value','$expired_on',1,'$added_on')");
		}else{
			mysqli_query($con,"update coupon_code set coupon_code='$coupon_code', coupon_type='$coupon_type' , coupon_value='$coupon_value', cart_min_value='$cart_min_value', expired_on='$expired_on' where id='$id'");
		}
		redirect('coupon_code.php');
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
                        <h1 class="m-0 text-dark">Manage Coupon Code :- <?= $coupon_code ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Coupon Code</li>
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
                  <label>Coupon Code :- </label>

                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Coupon Code" name="coupon_code" value="<?php echo $coupon_code?>" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Coupon Type :- </label>
                   <select name="coupon_type" required class="form-control">
						<option value="">Select Type</option>
						<?php
						$arr=array('P'=>'Percentage','F'=>'Fixed');
						foreach($arr as $key=>$val){
							if($key==$coupon_type){
								echo "<option value='".$key."' selected>".$val."</option>";
							}else{
								echo "<option value='".$key."'>".$val."</option>";
							}
							
						}
						?>
					  </select>
                  </div>
                  <!-- /.input group -->
                    <!-- phone mask -->
                	<div class="form-group">
                      <label for="exampleInputEmail3" required>Coupon Value</label>
                      <input type="textbox" class="form-control" placeholder="Coupon Value" name="coupon_value"  value="<?php echo $coupon_value?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3" required>Cart Min Value</label>
                      <input type="textbox" class="form-control" placeholder="Cart Min Value" name="cart_min_value"  value="<?php echo $cart_min_value?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3">Expired On</label>
                      <input type="date" class="form-control" placeholder="Expired On" name="expired_on"  value="<?php echo $expired_on?>">
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
                <!-- /.form group -->
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