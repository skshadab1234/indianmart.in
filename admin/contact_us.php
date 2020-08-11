<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from contact_us where id='$id'");
		redirect('contact_us.php');
	}
}

$sql="select * from contact_us where message_for=0 order by id";
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
                        <h1 class="m-0 text-dark">Contact US</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Contact US</li>
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
                            <th width="10%">Name</th>
							<th width="10%">Email</th>
							<th width="10%">Mobile</th>
							<th width="19%">Subject</th>
							<th width="40%">Message</th>
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
                            <td><?php echo $row['name']?></td>
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