<?php include('top.php');?>
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
                        <h1 class="m-0 text-dark">Orders</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Orders</li>
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
                           
                            <?php
						  $sql="select order_master.*,order_status.order_status as order_status_str from order_master,order_status where order_master.order_status=order_status.id order by order_master.id desc";
						$res=mysqli_query($con,$sql);
						  ?>
                           <!-- /.card-header -->
                             <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th width="5%">Order Id</th>
          <th width="20%">Name/Email/Mobile</th>
          <th width="20%">Address/Zipcode</th>
          <th width="5%">Price</th>
          <th width="10%">Payment Type</th>
          <th width="10%">Payment Status</th>
          <th width="10%">Order Status</th>
          <th width="15%">Added On</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                        <?php if(mysqli_num_rows($res)>0){
            $i=1;
            while($row=mysqli_fetch_assoc($res)){
            ?>
                                       <tr>
                                          <td><a href="order_detail.php?id=<?php echo $row['id']?>">ORD<?php echo $row['id']?></a></td>
                            <td>
                <p><?php echo $row['name']?></p>
                <p><?php echo $row['email']?></p>
                <p><?php echo $row['mobile']?></p>
              <td>
                <p><?php echo $row['address']?></p>
                <p><?php echo $row['zipcode']?></p>
              </td>
              <td style="font-size:14px;"><?php echo $row['total_price']?><br/>
                <?php
                if($row['coupon_code']!=''){
                ?>
                <?php echo $row['coupon_code']?><br/>
                <?php echo $row['final_price']?>
                <?php } ?>
              
              </td>
              <td><?php echo $row['payment_type']?></td>
              <td>
                <?php 
                $success ='danger';
                if ($row['payment_status'] == 'success') {
                  $success = 'success';
                }
                ?>
                <div class="badge bg-<?= $success ?>"><?php echo ucfirst($row['payment_status'])?></div>
              </td>
              <td><?php echo $row['order_status_str']?></td>
              <td>
              <?php 
              $dateStr=strtotime($row['added_on']);
              echo date('d-m-Y h:s',$dateStr);
              ?>
              </td>
              
                                       </tr>
                                       <?php }  }?>
                                    </tbody>
                                 </table>
                              </div>
                              <!-- /.table-responsive -->
                           </div>
                        </div>
                        <!-- /.card -->
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
        
         <?php include 'footer.php'; ?>
      </div>
      <!-- ./wrapper -->
   </body>
</html>