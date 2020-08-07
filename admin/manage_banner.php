<?php 
include('top.php');
$msg="";
$image="";
$heading="";
$sub_heading="";
$link="";
$link_txt="";
$order_number="";
$id="";
$image_status='required';
$image_error="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from banner where id='$id'"));
	$image=$row['image'];
	$heading=$row['heading'];
	$sub_heading=$row['sub_heading'];
	$link=$row['link'];
	$link_txt=$row['link_txt'];
	$order_number=$row['order_number'];
	$image_status='';
}

if(isset($_POST['submit'])){
	$heading=get_safe_value($_POST['heading']);
	$sub_heading=get_safe_value($_POST['sub_heading']);
	$link=get_safe_value($_POST['link']);
	$link_txt=get_safe_value($_POST['link_txt']);
	$order_number=get_safe_value($_POST['order_number']);
	$added_on=date('Y-m-d h:i:s');
	
		
	if($id==''){
		$type=$_FILES['image']['type'];
		if($type!='image/jpeg' && $type!='image/png'){
			$image_error="Invalid image format";
		}else{		
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BANNER_IMAGE.$image);
			mysqli_query($con,"insert into banner(heading,sub_heading,link,link_txt,order_number,status,added_on,image) values('$heading','$sub_heading','$link','$link_txt','$order_number',1,'$added_on','$image')");
			redirect('banner.php');
		}
	}else{
		if($_FILES['image']['type']==''){
			mysqli_query($con,"update banner set heading='$heading', sub_heading='$sub_heading',link='$link',link_txt='$link_txt',order_number='$order_number' where id='$id'");
			redirect('banner.php');
		}else{
			$type=$_FILES['image']['type'];	
			if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format";
			}else{
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BANNER_IMAGE.$image);
			
				mysqli_query($con,"update banner set heading='$heading', sub_heading='$sub_heading',link='$link',link_txt='$link_txt',order_number='$order_number',image='$image' where id='$id'");
				redirect('banner.php');
			}
		}
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
                        <h1 class="m-0 text-dark">Manage Banner :- <?= $heading ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Banner </li>
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
                 <form class="forms-sample" method="post" enctype="multipart/form-data">
					<div class="form-group">
                      <label for="exampleInputName1">Image</label>
                      <input type="file" class="form-control" placeholder="Image" name="image" <?php echo $image_status?>>
					  <div class="error mt8"><?php echo $image_error?></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Heading</label>
                      <input type="text" class="form-control" placeholder="Heading" name="heading" required value="<?php echo $heading?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Sub Heading</label>
                      <input type="text" class="form-control" placeholder="Sub Heading" name="sub_heading" required value="<?php echo $sub_heading?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Link</label>
                      <input type="text" class="form-control" placeholder="Link" name="link" required value="<?php echo $link?>">
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Link Txt</label>
                      <input type="text" class="form-control" placeholder="Link txt" name="link_txt" required value="<?php echo $link_txt?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Order Number</label>
                      <input type="textbox" class="form-control" placeholder="Order Number" name="order_number"  value="<?php echo $order_number?>">
                    </div>
                    
                    
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