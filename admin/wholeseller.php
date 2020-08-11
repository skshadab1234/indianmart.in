<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);

	if ($type == "delete") {
		mysqli_query($con,"delete from wholeseller where id='$id'");
		redirect('wholeseller.php');
	}

   if($type == 'blocked'){
      $status=1;
      mysqli_query($con,"update wholeseller set admin_blocked=1,admin_approv=0 where id='$id'");
      redirect('wholeseller.php');
  }

  if($type == 'approved'){
      mysqli_query($con,"update wholeseller set admin_blocked=0,admin_approv=1  where id='$id'");
      redirect('wholeseller.php');
  }

	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update wholeseller set status='$status' where id='$id'");
		redirect('wholeseller.php');
	}



}

$sql="select * from wholeseller order by id desc";
$res=mysqli_query($con,$sql);

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
                        <h1 class="m-0 text-dark">Wholeseller <a href='manage_wholeseller.php' class="btn btn-app"><i class="fas fa-edit"></i> Add New</a></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Wholeseller</li>
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
                            <th width="15%">Seller Profile</th>
                            <th width="10%">Seller Shop Name</th>
                            <th width="15%">Seller Email</th>
                            <th width="15%">Seller Name</th>
                            <th width="10%">Status</th>
                            <th width="10%">Approve Gst</th>
						              	<th width="10%">Added On</th>
                            <th width="15%">Actions</th>
                        </tr>
                                    </thead>
                                    <tbody >
						 <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
							if ($row['status'] == 1) {
								$status_boy = "<p style='color:green'>verified</p>";
							}else{
								$status_boy = "<p style='color:red'>not verified</p>";
							}
						?>
						<tr style="text-align: center;"> 
                            <td><?php echo $i?></td>
                            <td><div style="background-image: url(<?= SITE_SELLER_IMAGE.$row['seller_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 100px;height: 100px">
                            </div></td>
                            <td><?php echo $row['seller_shop_name']?></td>
							<td><?php echo $row['seller_email'].' '.$status_boy ?></td>
							<td><?php echo $row['seller_name']?></td>
							<td><?php 
								if ($row['status'] == 1) {
									$active = "success";
                  $text = "Verified";
									$color =  '';
								}else{
                  $text = "Not verified";
									$active = "not active";
									$color = "background: red;color:#fff";
								}

                
							  ?> <button class="btn btn-<?= $active ?>" style="<?= $color ?>"><?= $text ?></button></td>
                <td><a href="javascript:void(0)" data-toggle="modal" data-target="#view_gst<?= $row['id'] ?>">View Gst</a>
                  <?php 
              if($row['admin_blocked'] == 1){
                  $admin_text = "Blocked";
                  $color1 = "red";
                
                  ?>
                  <h5  class="btn" style="background: <?=  $color1 ?>;border: none;padding: 5px;color: #fff;font-size: 15px"><?= $admin_text ?></h5>
               <?php }
                  ?>
                 
              
                          <div class="modal fade" id="view_gst<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content" style="width: 100vw">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['seller_name'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body" style="background-image: url(<?= SITE_GST_IMAGE.$row['gst_img'] ?>);width: 100%;height: 51vh;background-repeat: no-repeat;background-size: contain;">
                          </div>
                          <div class="modal-footer">
                            <a href="<?= SITE_GST_IMAGE.$row['gst_img'] ?>" target="_blank"><button class="btn btn-primary">View Full Image</button></a>

                              <?php
                              if($row['admin_approv'] == 0){
                        ?>
                        <a href="?id=<?php echo $row['id']?>&type=approved" class="btn btn-success">Approve</a>
                        <?php
                        }else{

                        if($row['admin_blocked'] == 1){
                        ?>
                        <a href="?id=<?php echo $row['id']?>&type=approved" class="btn btn-danger">Unblock</a>
                        <?php
                        }else{
                        ?>
                        <a href="?id=<?php echo $row['id']?>&type=blocked" class="btn btn-danger">Block</a>
                        <?php
                        }}
                        
                        ?>
                          </div>
                          </div>
                          </div>
                          </div>
                           <?php
                  if ($row['admin_approv'] == 1) {
                    ?>
                     <h5  class="btn" style="background:green;border: none;padding: 5px;color: #fff;font-size: 15px">Approved</h5>
                  <?php } ?>
                </td>
							<td>
							<?php 
							$dateStr=strtotime($row['added_on']);
							echo date('d-m-Y',$dateStr);
							?>
							</td>
							<td>
								<a href="manage_wholeseller.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
								<?php
								if($row['status']==1){
								?>
								<a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-primary hand_cursor">Active</label></a>
								<?php
								}else{
								?>
								<a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
								<?php
								}
								
								?>
								<a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger hand_cursor">Delete</label></a>
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