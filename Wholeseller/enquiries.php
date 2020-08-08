<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
  $type=get_safe_value($_GET['type']);
  $id=get_safe_value($_GET['id']);
 
    if($type=='deactive'){
      $status=0;
        mysqli_query($con,"update enquires set status='$status' where id='$id'");
    }
    if($type=='approve'){
      mysqli_query($con,"update enquires set status='1' where id='$id'");
    }
    redirect('enquiries.php');
  
  }

$date = date('Y-m-d');
$id = $wholeseller['id'];
$sql="SELECT *,enquires.id as enid, enquires.status as enstatus FROM `enquires` LEFT JOIN wholeseller ON enquires.wholeseller_id = wholeseller.id LEFT JOIN retailers ON enquires.retail_id = retailers.id LEFT JOIN products ON enquires.product_id = products.id LEFT JOIN country ON retailers.retailer_country = country.id LEFT JOIN state ON state.StateID = retailers.retailer_state LEFT JOIN cities ON cities.city_id = retailers.retailer_city LEFT JOIN enquiry_value ON enquires.enquiry_value = enquiry_value.id WHERE  enquires.status != 0 and wholeseller_id = '$id' and show_on_date = '$date'";
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
                        <h1 class="m-0 text-dark"> Today Enquires</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Enquiries</li>
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
                            <th width="20%">Retailer Detail</th>
                            <th width="20%">Product Details</th>
                            <th width="20%">Action</th>
                        </tr>
                                    </thead>
                                    <tbody >
                                       <?php if(mysqli_num_rows($res)>0){
                                      $i=1;
                                      while ($row = mysqli_fetch_assoc($res)) {
                                      ?>
                                      <tr style="text-align: center;">
                                        <td><?= $i++ ?></td>
                                               <td>
                                               <h5> <?= $row['owner_name'] ?></h5>
                                                <!-- Button trigger modal -->
                                 <h6> <a href="" data-toggle="modal" data-target="#<?= $row['enid'] ?>">
                                    more details
                                  </a></h6>

                                   <div class="modal fade" id="<?= $row['enid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['owner_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                         <div class="container">
                                          <table>
                                            <tbody>
                                              <tr>
                                                <td>Shop Name</td>
                                                <td><?= $row['shop_name'] ?></td>
                                              </tr>
                                               <tr>
                                                <td>Email</td>
                                                <td><?= $row['retailer_email'] ?></td>
                                              </tr>
                                               <tr>
                                                <td>Address</td>
                                                <td><?= $row['retailer_address'] ?>,<?= $row['city_name'] ?>,<?= $row['StateName'] ?>,<?= $row['nicename'] ?></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                   <div class="modal fade" id="prod<?= $row['product_name'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['owner_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                         <div class="container">
                                          <table>
                                            <thead>
                                              <tr style="text-align: center;"><th>Image</th>
                                                <th>Details</th>
                                              </tr>
                                            </thead>
                                            <tbody style="text-align: center;">
                                              <tr style="text-align: center;">
                                                <td style="display: flex;justify-content: center;align-items: center;"><div style="background-image: url(<?= SITE_PRODUCTS_IMAGE.$row['prod_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 100px;height: 100px;">
                                            </div>
                                          </td>
                                            <td>
                                              <h6><?= $row['product_name'] ?></h6><hr>
                                              <h6><?= $row['quantity'] ?> <?= $row['unit'] ?></h6><hr>
                                              <h6><?= $row['requirement_msg'] ?></h6><hr>
                                              <h6>From <?= $row['from_rate'] ?> to <?= $row['to_rate'] ?></h6><hr>
                                              <h6><b>Estimate Rate :-</b> <?= "&#8377 ".number_format($row['estimate_rate'],1) ?> </h6>
                                            </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                          
                                          </td>

                                        <td>
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#prod<?= $row['product_name'] ?>">View details</a>
                                        </td>
                                         <td>
                                          <button class="btn btn-success">View</button>
                                          <a href="?id=<?= $row['enid']?>&type=deactive"><button class="btn btn-danger">Deactivate</button></a>
                                         </td>

                                    <?php } }?>
                                           <?php
                                           $sql="SELECT *,enquires.id as enid, enquires.status as enstatus FROM `enquires` LEFT JOIN wholeseller ON enquires.wholeseller_id = wholeseller.id LEFT JOIN retailers ON enquires.retail_id = retailers.id LEFT JOIN products ON enquires.product_id = products.id LEFT JOIN country ON retailers.retailer_country = country.id LEFT JOIN state ON state.StateID = retailers.retailer_state LEFT JOIN cities ON cities.city_id = retailers.retailer_city LEFT JOIN enquiry_value ON enquires.enquiry_value = enquiry_value.id WHERE  enquires.status != 0 and wholeseller_id = '$id' and show_on_date > '$date'";
                                         $res=mysqli_query($con,$sql);

                                            if(mysqli_num_rows($res)>0){
                                      $i=2;
                                      while ($row = mysqli_fetch_assoc($res)) {
                                        if ($row['show_on_date'] != $date) {
                                          
                                      ?>
                                      <tr style="text-align: center;">
                                        <td><?= $i++ ?></td>
                                               <td>
                                               <h5> <?= $row['owner_name'] ?></h5>
                                                <!-- Button trigger modal -->
                                 <h6> <a href="" data-toggle="modal" data-target="#<?= $row['enid'] ?>">
                                    More details
                                  </a></h6>

                                   <div class="modal fade" id="<?= $row['enid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['owner_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                         <div class="container">
                                            <?php
                                            $data1 = $row['show_on_date'];
                                            $new_date = date('d M, Y', strtotime($data1));
                                            ?>
                                            <h3 style="color: red">It will resume on <?= $new_date ?></h3>
                                            <?php
                                            ?>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                   <div class="modal fade" id="<?= $row['product_name'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['owner_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                         <div class="container">
                                           <?php
                                            $data2 = $row['show_on_date'];
                                            $new_date2 = date('d M, Y', strtotime($data2));
                                            ?>
                                            <h3 style="color: red">It will resume on <?= $new_date2 ?></h3>
                                            <?php
                                            ?>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                          
                                          </td>

                                        <td>
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#<?= $row['enid'] ?>">View details</a>
                                        </td>
                                         <td>
                                          <button class="btn btn-danger">Unlock On <?php
                                           $data1 = $row['show_on_date'];
                                            $new_date1 = date('d M, Y', strtotime($data1));
                                           ?>
                                          <?=
                                            $new_date1 ?>
                                            </button>
                                         </td>
                                         
                                    <?php } } }?>
                                    </tbody>
                                 </table>
                               </div>
                             </div>
                                 
                              <!-- /.table-responsive -->

  <!-- TABLE: LATEST ORDERS -->
            <div class="col-sm-6" style="padding: 10px">
                        <h2 class="m-0 text-dark"> Deactivated By me</h2>
                     </div>

                        <div class="card">
                             <div class="card-body">
                          <table id="example3" class="table table-bordered table-striped">
                            <thead>
                            <tr style="text-align: center;">
                            <th width="5%">S.No #</th>
                            <th width="20%">Retailer Detail</th>
                            <th width="20%">Product Details</th>
                            <th width="20%">Action</th>
                        </tr>
                                    </thead>
                                    <tbody >
                                       <?php 
                                       $sql="SELECT *,enquires.id as enid, enquires.status as enstatus FROM `enquires` LEFT JOIN wholeseller ON enquires.wholeseller_id = wholeseller.id LEFT JOIN retailers ON enquires.retail_id = retailers.id LEFT JOIN products ON enquires.product_id = products.id LEFT JOIN country ON retailers.retailer_country = country.id LEFT JOIN state ON state.StateID = retailers.retailer_state LEFT JOIN cities ON cities.city_id = retailers.retailer_city LEFT JOIN enquiry_value ON enquires.enquiry_value = enquiry_value.id WHERE enquires.status != 1 and wholeseller_id = '$id'";
                              $res=mysqli_query($con,$sql);
                                       if(mysqli_num_rows($res)>0){
                                      $i=1;
                                      while ($row = mysqli_fetch_assoc($res)) {
                                      ?>
                                      <tr style="text-align: center;">
                                        <td><?= $i++ ?></td>
                                               <td>
                                               <h5> <?= $row['owner_name'] ?></h5>
                                                <!-- Button trigger modal -->
                                 <h6> <a href="" data-toggle="modal" data-target="#<?= $row['enid'] ?>">
                                    more details
                                  </a></h6>

                                   <div class="modal fade" id="<?= $row['enid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['owner_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                         <div class="container">
                                          <table>
                                            <tbody>
                                              <tr>
                                                <td>Shop Name</td>
                                                <td><?= $row['shop_name'] ?></td>
                                              </tr>
                                               <tr>
                                                <td>Email</td>
                                                <td><?= $row['retailer_email'] ?></td>
                                              </tr>
                                               <tr>
                                                <td>Address</td>
                                                <td><?= $row['retailer_address'] ?>,<?= $row['city_name'] ?>,<?= $row['StateName'] ?>,<?= $row['nicename'] ?></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                   <div class="modal fade" id="prod<?= $row['product_name'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['owner_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                         <div class="container">
                                          <table>
                                            <thead>
                                              <tr style="text-align: center;"><th>Image</th>
                                                <th>Details</th>
                                              </tr>
                                            </thead>
                                            <tbody style="text-align: center;">
                                              <tr style="text-align: center;">
                                                <td style="display: flex;justify-content: center;align-items: center;"><div style="background-image: url(<?= SITE_PRODUCTS_IMAGE.$row['prod_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 100px;height: 100px;">
                                            </div>
                                          </td>
                                            <td>
                                              <h6><?= $row['product_name'] ?></h6><hr>
                                              <h6><?= $row['quantity'] ?> <?= $row['unit'] ?></h6><hr>
                                              <h6><?= $row['requirement_msg'] ?></h6><hr>
                                              <h6>From <?= $row['from_rate'] ?> to <?= $row['to_rate'] ?></h6><hr>
                                              <h6><b>Estimate Rate :-</b> <?= "&#8377 ".number_format($row['estimate_rate'],1) ?> </h6>
                                            </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                         </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                          
                                          </td>

                                        <td>
                                         <a href="javascript:void(0)" data-toggle="modal" data-target="#prod<?= $row['product_name'] ?>">View details</a>
                                        </td>
                                         <td>
                                          
                                          <a href="?id=<?= $row['enid']?>&type=approve"><button class="btn btn-danger">Unblock</button></a>


                                         </td>
                                    <?php } }?>
                                    </tbody>
                                 </table>
                               </div>
                             </div>
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