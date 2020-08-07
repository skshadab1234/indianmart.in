<?php 
include('top.php');
$msg="";
$category="";
$id="";
$image_required = "required";
if(isset($_GET['id']) && $_GET['id']>0){
  $image_required = "";
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from category where id='$id'"));
	$category=$row['catgeory_name'];
}

if(isset($_POST['submit'])){
	$category=get_safe_value($_POST['category']);
	$added_on=date('Y-m-d h:i:s');
	
    $category_img = $_FILES['category_image']['name'];
     if (!empty($category_img)) {
        $profile = time().'_'.$category_img;
     $target = "../media/category/".$profile;
     move_uploaded_file($_FILES['category_image']['tmp_name'], $target);
     $category_img = $profile;
     }else{
      $category_img = $row['category_img'];
     }

	if($id==''){
		$sql="select * from category where catgeory_name='$category'";
	}else{
		$sql="select * from category where catgeory_name='$category' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Category already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into category(catgeory_name,category_img,category_status,added_on) values('$category','$category_img',1,'$added_on')");
		}else{
			mysqli_query($con,"update category set catgeory_name='$category',category_img='$category_img' where id='$id'");
		}
		
		redirect('category.php');
	}
}
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
                        <h1 class="m-0 text-dark">Manage Category :- <?= $category ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Category </li>
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
                      <label for="exampleInputName1">Category</label>
                      <input type="text" class="form-control" placeholder="Category" name="category" required value="<?php echo $category?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1">Seller Image</label>
                    <input type="file" name="category_image"  class="form-control" <?= $image_required ?> >
                  </div>
                  <div class="form-group" style="background-image: url(<?= SITE_SELLER_IMAGE.$update_seller['seller_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 40px;height: 40px">
                    
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