<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if ($type == 'delete') {
			$sql = mysqli_query($con, "delete from products where id = '$id'");
			redirect('products.php');
		}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update products set status='$status' where id='$id'");
		redirect('wholeseller_products.php');
	}

}
$id = $wholeseller['id'];
$sql="SELECT *,products.id as pid, products.status as prostatus FROM `products` LEFT JOIN category ON products.cat_id = category.id LEFT JOIN subcategory ON products.sub_catid = subcategory.id where added_by = '$id'";
$res=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                        <h1 class="m-0 text-dark">Manage Product<a href='manage_products.php' class="btn btn-app"><i class="fas fa-edit"></i> Add New</a></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Product</li>
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
                      
                   <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                             <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr style="text-align: center;">
                            <th width="5%">S.No #</th>
                            <th width="5%">Product Detail</th>
                            <th width="10%">Product Image</th>
                            <th width="10%">Shipping Cost</th>
                            <th width="15%">Product Dimensions</th>
                            <th width="10%">Added On</th>
                            <th width="20%">Actions</th>
                        </tr>
                                    </thead>
                                    <tbody >
                                       <?php if(mysqli_num_rows($res)>0){
                                      $i=1;
                                      while ($row = mysqli_fetch_assoc($res)) {
                                        $pid = $row['pid'];
                                        $sql1 = "select * from product_details where product_id = '$pid'";
                                        $res1 = mysqli_query($con,$sql1);
                                        
                                      ?>
                                      <tr style="text-align: center;">
                                        <td><?= $i++ ?></td>
                                               <td>
                                               <h5> <?= $row['product_name'] ?></h5>
                                                <!-- Button trigger modal -->
                                 <h6> <a href="" data-toggle="modal" data-target="#pid<?= $row['pid'] ?>">
                                    view details
                                  </a></h6>
                                  <h6><a href="" data-toggle="modal" data-target="#desc<?= $row['pid'] ?>">view description</a>
                                  </h6>

                                   <div class="modal fade" id="desc<?= $row['pid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['product_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                         <div class="container">
                                          <?= $row['description'] ?>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Modal -->
                                  <div class="modal fade" id="pid<?= $row['pid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['product_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                          
                                             <table id="example2">
                                            <tr style="text-align: center;">
                                              <th>Attributes</th>
                                              <th>Quantity</th>
                                              <th>Price</th>
                                              <th>Old Price</th>
                                            </tr>
                                            <tbody>
                                            <?php 
                                          while ($row1 = mysqli_fetch_assoc($res1)) {
                                          ?>
                                            <tr style="text-align: center;">
                                              <td><?= $row1['attribute'] ?></td>
                                              <td><?= $row1['qty'] ?></td>
                                              <td><?= $row1['price'] ?></td>
                                              <td><?= $row1['old_price'] ?></td>
                                            </tr>
                                          <?php
                                            } ?>
                                            </tbody>
                                          </table>
                                          </td>

                                        <td><div style="background-image: url(<?= SITE_PRODUCTS_IMAGE.$row['prod_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 100px;height: 100px">
                                          </div></td>
                                         
                                          <td><?= ' ₹ '.number_format($row['shipping_cost'],1) ?></td>
                                          <td><?= $row['product_measure'] ?></td>
                                          <td><?= $row['added_on'] ?></td>
                                          <td>
                <a href="manage_products.php?id=<?php echo $row['pid']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
                <?php
                if($row['prostatus']==1){
                ?>
                <a href="?id=<?php echo $row['pid']?>&type=deactive"><label class="badge badge-primary hand_cursor">Active</label></a>
                <?php
                }else{
                ?>
                <a href="?id=<?php echo $row['pid']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
                <?php
                }
                
                ?>
                <a href="?id=<?php echo $row['pid']?>&type=delete"><label class="badge badge-danger hand_cursor">Delete</label></a>
              </td>
                                      </tr>


                                    <?php } }?>
                                    </tbody>
                                 </table>
                               </div>
                             </div>
                                  </div>
                                </div>
                              </div>
                              </div>
                              <!-- /.table-responsive -->

                     </div>
                   </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </div>
  </div>
      <!-- ./wrapper -->
   </body>
</html>