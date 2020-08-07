<?php 
   include('top.php');
   if(isset($_GET['id']) && $_GET['id']>0){
      
      $id=get_safe_value($_GET['id']);
      
      if (isset($_POST['add_delay_message'])) {
         $delay_msg = $_POST['delay_msg'];
         $getOrderById=getOrderById($id);
         $user_id=$getOrderById['0']['user_id'];
      $added_on=date('Y-m-d H:i:s');
      $res=mysqli_query($con,"select * from track_details where delay_msg = '$delay_msg' and order_id = '$id'");
         if(mysqli_num_rows($res)>0){
         }
         else{$sql2 = "insert into track_details(user_id,order_id,message,delay_msg,added_on) Values('$user_id', '$id', '', '$delay_msg','$added_on')";
                  mysqli_query($con,$sql2);
      }
         redirect(FRONT_SITE_PATH.'admin/order_detail.php?id='.$id);

   }  
   
   
   
      if(isset($_GET['order_status'])){

         $order_status=get_safe_value($_GET['order_status']);
         $getOrderById=getOrderById($id);
         $user_id=$getOrderById['0']['user_id'];
         $added_on=date('Y-m-d H:i:s');
         $res=mysqli_query($con,"select * from track_details where message = '$order_status' and order_id = '$id'");
         if(mysqli_num_rows($res)>0){
         }
         else{$sql1 = "insert into track_details(user_id,order_id,message,added_on) Values('$user_id', '$id', '$order_status', '$added_on')";
      mysqli_query($con,$sql1);
   }
         if($order_status==5){
            $cancel_at=date('Y-m-d h:i:s');
            $sql="update order_master set order_status='$order_status',cancel_by='admin',cancel_at='$cancel_at' where id='$id'";    
         }elseif($order_status==4){
            $cancel_at=date('Y-m-d h:i:s');
            $sql="update order_master set order_status='$order_status',payment_status='success' where id='$id'"; 

         }
         else{
            $sql="update order_master set order_status='$order_status' where id='$id'";
         }
         mysqli_query($con,$sql);
         $getSetting=getSetting();
         $referral_amt=$getSetting['referral_amt'];
         if($referral_amt>0){
            if($order_status==4){
               $getOrderById=getOrderById($id);
               
               $user_id=$getOrderById['0']['user_id'];
               $row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_order from order_master where user_id='$user_id' and order_status=4"));
               $total_order=$row['total_order'];
               if($total_order==1){
                  
                  $res=mysqli_query($con,"select from_referral_code,email from user where id='$user_id'");
                  if(mysqli_num_rows($res)>0){
                     $row=mysqli_fetch_assoc($res);
                     $email=$row['email'];
                     $from_referral_code=$row['from_referral_code'];
                     $row=mysqli_fetch_assoc(mysqli_query($con,"select id from user where referral_code='$from_referral_code'"));
                     $uid=$row['id'];
                     $msg1='Referral Amt from '.$email;
                     manageWallet($uid,$referral_amt,'in',$msg1);
                  }
                  
               }
               
            }
         }
         
         
         
         
         redirect(FRONT_SITE_PATH.'admin/order_detail.php?id='.$id);
      }
      
      if(isset($_GET['delivery_boy'])){
         $delivery_boy=get_safe_value($_GET['delivery_boy']);
         mysqli_query($con,"update order_master set delivery_boy_id='$delivery_boy' where id='$id'");
         redirect(FRONT_SITE_PATH.'admin/order_detail.php?id='.$id);
      }
      
      $sql="select order_master.*,order_status.order_status as order_status_str from order_master,order_status where order_master.order_status=order_status.id and order_master.id='$id' order by order_master.id desc";
      $res=mysqli_query($con,$sql);
      if(mysqli_num_rows($res)>0){
         $orderRow=mysqli_fetch_assoc($res);
      }else{
         redirect('index.php');
      }
   }else{
      redirect('index.php');
   }
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

            .hh-grayBox {
   background-color: #F8F8F8;
   margin-bottom: 20px;
   padding: 35px;
  margin-top: 20px;
}
.pt45{padding-top:45px;}

.order-tracking:nth-child(1){
   margin: 0;
}
.order-tracking{
   text-align: center;
   width: 216px;
   position: relative;
   display: block;
   margin-top: 114px;
}
.order-tracking .is-complete{
   display: block;
   position: relative;
   border-radius: 50%;
   height: 30px;
   width: 30px;
   border: 0px solid #AFAFAF;
   background-color: #f7be16;
   margin: 0 auto;
   transition: background 0.25s linear;
   -webkit-transition: background 0.25s linear;
   z-index: 2;
}
.order-tracking .is-complete:after {
   display: block;
   position: absolute;
   content: '';
   height: 14px;
   width: 7px;
   top: -2px;
   bottom: 0;
   left: 5px;
   margin: auto 0;
   border: 0px solid #AFAFAF;
   border-width: 0px 2px 2px 0;
   transform: rotate(45deg);
   opacity: 0;
}
.order-tracking.completed .is-complete{
   border-color: #27aa80;
   border-width: 0px;
}
.order-tracking.completed .is-complete:after {
   border-color: #fff;
   border-width: 0px 3px 3px 0;
   width: 7px;
   left: 11px;
   opacity: 1;
}



.order-tracking .is-cancel{
   display: block;
   position: relative;
   border-radius: 50%;
   height: 30px;
   width: 30px;
   border: 0px solid #AFAFAF;
   background-color: red;
   margin: 0 auto;
   transition: background 0.25s linear;
   -webkit-transition: background 0.25s linear;
   z-index: 2;
}
.order-tracking .is-cancel:after, .is-cancel:before  {
   display: block;
   position: absolute;
   content: '';
   height: 14px;
   width: 7px;
   top: -2px;
   bottom: 0;
   left: 5px;
   margin: auto 0;
   border: 0px solid #AFAFAF;
   border-width: 0px 2px 2px 0;
   transform: rotate(45deg);
   opacity: 0;
}
.order-tracking.cancel .is-cancel{
   border-color: red;
   border-width: 0px;
}
.order-tracking.cancel .is-cancel:before {
  border-color: #fff;
    border-width: 0px 4px 0px 0;
    width: 15px;
    left: 11px;
    top: -6px;
    opacity: 1;
    transform: rotate(139deg);
    height: 20px;
}

.order-tracking.cancel .is-cancel:after {
  border-color: #fff;
    border-width: 0px 4px 0px 0;
    width: 9px;
    left: 12px;
    top: 4px;
    opacity: 1;
    transform: rotate(221deg);
    height: 21px;
}


.order-tracking p {
   color: #A4A4A4;
   font-size: 16px;
   margin-top: 8px;
   margin-bottom: 0;
   line-height: 20px;
}

.order-tracking p span{font-size: 14px;}
.order-tracking.completed p{color: #000;}
.order-tracking::before {
  content: '';
    display: block;
    width: 4px;
    height: calc(60% - -12px);
    background-color: #f7be16;
    top: -92px;
    position: absolute;
    left: 105px;
    z-index: 0;
}
.order-tracking:first-child:before{display: none;}
.order-tracking.completed:before{background-color: #27aa80;}
.order-tracking.cancel:before{background-color: red;}

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
                        <h1 class="m-0 text-dark">Invoice</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container-fluid -->
            </div>
        <!-- Content Wrapper. Contains page content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> SPSTORE, Inc.
                    <small class="float-right">Date:  <?php  echo dateFormat($orderRow['added_on'])?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?= $_SESSION['ADMIN_USER'] ?>, Inc.</strong><br>
                   
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php  echo $orderRow['name']?></strong><br>
                  <?php  echo $orderRow['address']?><br/>
                  <?php  echo $orderRow['zipcode']?><br/>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Order ID:</b> <?php echo $id?><br>
                  <b>Payment Mode :</b> <?php 
           $getOrderById = getOrderById($id);
           foreach ($getOrderById as  $value) {
            $mode = $value['payment_type'];
            $payment_status = $value['payment_status'];
               $bgcolor = "green";
               if ($payment_status == "pending") {
                  $bgcolor = "red";
               }
            ?>
            <span style="text-transform: capitalize;"><?= $mode ?>&nbsp;&nbsp;<small style="font-size: 13px;background-color:<?= $bgcolor?>;color:#fff;padding:4px;letter-spacing: 1px;font-family: calibri;font-weight: 700"><?= $payment_status ?></small></span>
            <?php
           }
            ?><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                     <th>#</th>
                        <th>Description</th>
                        <th class="text-right">Quantity</th>
                        <th class="text-right">Unit cost</th>
                        <th class="text-right">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                 <?php
                        $getOrderDetails=getOrderDetails($id);
                        $pp=0;
                        $i=1;
                        foreach($getOrderDetails as $list){
                        $pp=$pp+($list['price']*$list['qty']); 
                        ?>
                     <tr class="text-right">
                        <td class="text-left"><?php echo $i?></td>
                        <td class="text-left"><?php echo $list['dish']?>(<?php echo $list['attribute']?>)</td>
                        <td><?php echo $list['qty']?></td>
                        <td><?php echo $list['price']?></td>
                        <td><?php echo $list['price']*$list['qty']?></td>
                     </tr>
                     <?php 
                        $i++;
                        } ?>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <?php 
                  if ($orderRow['payment_type'] == "paytm") {
                  ?>
                   <img src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Paytm_logo.jpg" width="120px" alt="Visa">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Paytm is an Indian e-commerce payment system and financial technology company, based in Noida, Uttar Pradesh, India
                  </p>
                  <?php
                  }elseif($orderRow['payment_type'] == "cod"){
                     ?>
                      <img src="https://cdn.onlinewebfonts.com/svg/img_462168.png" width="120px" alt="Visa">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  Cash on delivery, sometimes called collect on delivery or cash on demand, is the sale of goods by mail order where payment is made on delivery rather than in advance.
                  </p>
                     <?php
                  }else{
                     
?>
<h2>Wallet</h2>
 <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  A digital wallet (or e-wallet) is a software-based system that securely stores users' payment information and passwords for numerous payment methods and websites. ... Digital wallets can be used in conjunction with mobile payment systems, which allow customers to pay for purchases with their smartphones.
                  </p>
<?php
                  }

                  ?>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <div class="table-responsive">
                    <div class="container-fluid mt-5 w-100">
            <h4 class="text-right mb-5">Total : ₹ <?php echo number_format($pp,1); ?></h4>
            <?php
               if($orderRow['coupon_code']!=''){
               ?>
            <h4 class="text-right mb-5">Coupon Code :  <?php echo $orderRow['coupon_code']?></h4>
            <h4 class="text-right mb-5">Final Total : ₹ <?php echo number_format($orderRow['final_price'],1) ?></h4>
            <?php
               }
               ?>
            <hr>
         </div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
 <?php
            $orderStatusRes=mysqli_query($con,"select * from order_status order by id asc");
            
            $orderDeliveryBoyRes=mysqli_query($con,"select * from delivery_boy where status=1 order by name");
            
            ?>
         <div>
            <?php
               echo "<h4>Order Status:- ".$orderRow['order_status_str']."</h4>";
               ?>
            <select class="form-control wSelect200" name="order_status" id="order_status" onchange="updateOrderStatus()">
               <option val=''>Update Order Status</option>
               <?php 
                  while($orderStatusRow=mysqli_fetch_assoc($orderStatusRes)){
                     echo "<option value=".$orderStatusRow['id'].">".$orderStatusRow['order_status']."</option>";
                  }
                  ?>
            </select>
            <br/>
            <?php
               echo "<h4>Delivery Boy:- ".getDeliveryBoyNameById($orderRow['delivery_boy_id'])."</h4>";
               ?>
            <select class="form-control wSelect200" name="delivery_boy" id="delivery_boy" onchange="updateDeliveryBoy()">
               <option val=''>Assign Delivery Boy</option>
               <?php 
                  while($orderDeliveryBoyRow=mysqli_fetch_assoc($orderDeliveryBoyRes)){
                     echo "<option value=".$orderDeliveryBoyRow['id'].">".$orderDeliveryBoyRow['name']."</option>";
                  }
                  ?>
            </select>
         </div>
         <div class="container-fluid mt-5 d-flex justify-content-center w-100">
            <div class="page-header mt5">
               <h3 class="page-title"> Tracking Details :-   

<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">see update</a>

               </h3>
            </div>
         </div>
         <div class="container-fluid mt-5 d-flex justify-content-center w-100">
            <div class="table-responsive w-100">
               <table class="table" id="example1">
                  <thead>
                     <tr class="bg-dark">
                        <th class="text-center">Date/Address</th>
                        <th class="text-center">Remarks</th>
                        <th class="text-center">Location</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $getTrackById=getTrackById($id);
                        // prx($getTrackById);
                        foreach($getTrackById as $track){
                           $added_on = $track['added_on'];
                           $new = date('d, M,Y h:i:s', strtotime($added_on));
                           $times_Ago  = times_ago($added_on);

                        ?>
                     <tr class="text-center">
                        <td><b><?= $new ?></b> </td>
                        <td><?= $track['order_status'] ?> <?= $track['delay_msg'] ?> <small><?= $times_Ago ?></small></td>
                        <td>

                           <?php
                           if (empty($track['arrived_at']) and  $track['delay_msg'] == '') {
                     echo '<a href="addlocation.php?addlocation='.$track['message'].' '.$track['delay_msg'].'&order_id='.$id.'">Add Location</a>';  
                              
                           }else{
                              echo $track['arrived_at'];
                           }

                           ?>

                        </td>
                     </tr>
                     <?php 
                        } ?>
                  </tbody>
               </table>

            </div>
            
         </div>
          <form  method = "post">
            <div class="form-group" style="margin-top: 20px" method="post">
               <h5>Add Delay Message :-</h5>
               <div class="row mt8" id="box'+add_more+'"><div class="col-10"><input type="text" class="form-control" placeholder="if any" name="delay_msg" required></div><div class="col-2"> <button type="submit" name="add_delay_message" class="btn badge-primary mr-2" >Submit</button></div></div>
            </div>
      </form>
              <!-- this row will not appear when printing -->
              <div class="row no-print">
            <a href="../download_invoice.php?id=<?php echo $id?>" class="btn btn-success float-right"><i class="mdi mdi-printer mr-1"></i>PDF</a>
         </div>
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
          
              </div>
                     <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
                     <div class="row justify-content-between" style="display: flex;flex-direction: column;">
                        <div class="order-tracking completed">
                           <span class="is-complete" style="background-color: #27aa80 "></span>
                           <p>Ordered<br><span> <?php  echo dateFormat($orderRow['added_on'])?></span></p>
                        </div>

                           <?php 
                                  $getTrackById=getTrackById($id);
                                  foreach($getTrackById as $track){
                           $cook_date =  $track['added_on'];
                           $final_time = times_ago($cook_date);


                            $outofdelivery_date =  $track['added_on'];
                           $new_date_delivered = date("M d,Y/D", strtotime($outofdelivery_date));
                           $delivered_time = date("h:i A", strtotime($outofdelivery_date));
                           $outofdelivery_date = times_ago($outofdelivery_date);

                              $cancel = "completed";
                              $is_cancel = "is-complete";
                              $color = "#27aa80";
                              if ($track['message']  == 5) {
                                 $cancel = "cancel";
                                 $is_cancel = "is-cancel";
                                 $color = "red";
                              }
                              ?>

                        <div class="order-tracking <?= $cancel ?>">
                           <span class="<?= $is_cancel ?>"  style="background-color: <?= $color ?> "></span>
                           <p> <?= $track['order_status'].' '.$track['delay_msg'] ?><br><span><?php
                              if ($track['message'] == 4) {
                                 echo $new_date_delivered."<br> (".$delivered_time .") <br>".$outofdelivery_date;
                              }else{
                                 echo $final_time;
                              }

                            ?></span></p>
                        </div>
                              <?php
                           }

                        ?>


                        
               </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
      </div>
</div>

               <!--/. container-fluid -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
         </aside>
         <!-- /.control-sidebar -->
       <input type="hidden" id="add_more" value="1"/>
<script> 
   function updateOrderStatus(){
      var order_status=jQuery('#order_status').val();
      if(order_status!=''){
         var oid="<?php echo $id?>";
         window.location.href='<?php echo FRONT_SITE_PATH?>admin/order_detail.php?id='+oid+'&order_status='+order_status;
      }
   }
   
   function updateDeliveryBoy(){
      var delivery_boy=jQuery('#delivery_boy').val();
      if(delivery_boy!=''){
         var oid="<?php echo $id?>";
         window.location.href='<?php echo FRONT_SITE_PATH?>admin/order_detail.php?id='+oid+'&delivery_boy='+delivery_boy;
      }
   }
   
   
</script>       
         <?php include 'footer.php'; ?>
      </div>
      <!-- ./wrapper -->
   </body>
</html>