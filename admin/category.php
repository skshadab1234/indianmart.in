<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from category where id='$id'");
		redirect('category.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update category set category_status='$status' where id='$id'");
		redirect('category.php');
	}

}

$sql="select * from category order by id";
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
                        <h1 class="m-0 text-dark">Manage Category<a href='manage_category.php' class="btn btn-app"><i class="fas fa-edit"></i> Add New</a></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Category</li>
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
                            <th width="20%">Category Image</th>
                            <th width="20%">Category</th>
                            <th width="15%">Status</th>
                            <th width="15%">Added on</th>
                            <th width="25%">Actions</th>
                        </tr>
                                    </thead>
                                    <tbody>
						 <?php if(mysqli_num_rows($res)>0){
						$i=1;
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
                            <td><?php echo $i?></td>
                            <td><div style="background-image: url(<?= SITE_CATEGORY_IMAGE.$row['category_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 100px;height: 100px">
                            <td><?php echo $row['catgeory_name']?></td>
							<td><?php 
                if ($row['category_status'] == 1) {
                  $active = "success";
                  $color =  '';
                }else{
                  $active = "not active";
                  $color = "background: red;color:#fff";
                }
                ?> <button class="btn btn-<?= $active ?>" style="<?= $color ?>"><?= $active ?></button></td>
              <td>
                <?php 
              $dateStr=strtotime($row['added_on']);
              echo date('d-m-Y',$dateStr);
              ?>
							<td>
								<a href="manage_category.php?id=<?php echo $row['id']?>"><label class="badge badge-success hand_cursor">Edit</label></a>&nbsp;
								<?php
								if($row['category_status']==1){
								?>
								<a href="?id=<?php echo $row['id']?>&type=deactive"><label class="badge badge-primary hand_cursor">Active</label></a>
								<?php
								}else{
								?>
								<a href="?id=<?php echo $row['id']?>&type=active"><label class="badge badge-info hand_cursor">Deactive</label></a>
								<?php
								}
								
								?>
								&nbsp;
								<a href="?id=<?php echo $row['id']?>&type=delete"><label class="badge badge-danger delete_red hand_cursor">Delete</label></a>
							</td>
                           
                        </tr>
                        <?php 
						$i++;
						} }  ?>	
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