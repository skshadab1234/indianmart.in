<?php 
include('top.php');

if(isset($_POST['submit'])){
  $cart_min_price=get_safe_value($_POST['cart_min_price']);
  $cart_min_price_msg=get_safe_value($_POST['cart_min_price_msg']);
  $website_close=get_safe_value($_POST['website_close']);
  $website_close_msg=get_safe_value($_POST['website_close_msg']);
  $wallet_amt=get_safe_value($_POST['wallet_amt']);
  $referral_amt=get_safe_value($_POST['referral_amt']);
  mysqli_query($con,"update setting set cart_min_price='$cart_min_price', cart_min_price_msg='$cart_min_price_msg', website_close='$website_close', website_close_msg='$website_close_msg',wallet_amt='$wallet_amt',referral_amt='$referral_amt' where id='1'");
}

$row=mysqli_fetch_assoc(mysqli_query($con,"select * from setting where id='1'"));
$cart_min_price=$row['cart_min_price'];
$cart_min_price_msg=$row['cart_min_price_msg'];
$website_close=$row['website_close'];
$website_close_msg=$row['website_close_msg'];
$wallet_amt=$row['wallet_amt'];
$referral_amt=$row['referral_amt'];
$websiteCloseArr=array('No','Yes');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Setting</title>
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
                        <h1 class="m-0 text-dark"> Setting </h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Setting</li>
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
               <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Cart min price</label>
                      <input type="text" class="form-control" placeholder="Cart min price" name="cart_min_price" required value="<?php echo $cart_min_price?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Order Number</label>
                      <input type="textbox" class="form-control" placeholder="Cart min price msg" name="cart_min_price_msg"  value="<?php echo $cart_min_price_msg?>">
                    </div>
                    
          <div class="form-group">
                      <label for="exampleInputEmail3" required>Website Close</label>
                      <select name="website_close" class="form-control">
            <option value="">Select Option</option>
            <?php foreach($websiteCloseArr as $key=>$val){
              if($website_close==$key){
                echo "<option value='$key' selected='selected'>$val</option>";
              }else{
                echo "<option value='$key'>$val</option>";
              }
            } ?>  
            <select>
                    </div>
          <div class="form-group">
                      <label for="exampleInputEmail3" required>Website Close Msg</label>
                      <input type="textbox" class="form-control" placeholder="Website close msg" name="website_close_msg"  value="<?php echo $website_close_msg?>">
                    </div>
          <div class="form-group">
                      <label for="exampleInputEmail3" required>Wallet Amt</label>
                      <input type="textbox" class="form-control" placeholder="Website close msg" name="wallet_amt"  value="<?php echo $wallet_amt?>">
                    </div>
          <div class="form-group">
                      <label for="exampleInputEmail3" required>Referral Amt</label>
                      <input type="textbox" class="form-control" placeholder="Website close msg" name="referral_amt"  value="<?php echo $referral_amt?>">
                    </div>
              
<button type="submit" name="submit" class="btn  btn-outline-primary">
Update
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