<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from enquires where id='$id'");
		redirect('enquiry.php');
	}
}

$sql="SELECT *, retailers.id as retailid FROM `enquires` LEFT JOIN retailers ON retailers.id = enquires.retail_id LEFT JOIN wholeseller ON wholeseller.id = enquires.wholesaler_id LEFT JOIN products ON products.id = enquires.product_id where enquires.status = 1
";
$res=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
    
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
                        <h1 class="m-0 text-dark">Enquires</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Enquires</li>
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
                             <tr>
                            <th width="10%">S.No #</th>
                            <th width="20%">Retailer Name</th>
              							<th width="20%">Wholesaler Name</th>
              							<th width="20%">Product</th>
              							<th width="29%">Message</th>
              							<th width="10%">Status</th>
                            <th width="10%">Actions</th>
                        </tr>
                                    </thead>
                                    <tbody>
						<?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td>
                              <div class="container">
                               <address style="position: relative;">
                              Enquiry by <span style="background-image: url(<?= SITE_RETAIL_IMAGE.$row['retailer_img'] ?>);background-repeat: no-repeat;width: 50px;height: 50px;background-size: contain;border-radius: 15%;display: block;position: absolute;right: -15px;top: 0;"></span><a href='profile.php?id=<?= $row['retailid'] ?>'><?= $row['owner_name'] ?></a>.<br>
                              Shop Name is <?= $row['owner_name'] ?><br>
                              Example.com<br>
                              Box 564, Disneyland<br>
                              USA
                              </address>
                              </div>
                            </td>
              							<td><?php echo $row['email']?></td>
              							<td><?php echo $row['mobile']?></td>
              							<td><?php echo $row['subject']?></td>
              							<td><?php echo $row['message']?></td>
              							<td>
              								<a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
              							</td>
                           
                        </tr>
                        <?php 
						$i++;
						} } ?>	
                                    </tbody>
                                 </table>
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