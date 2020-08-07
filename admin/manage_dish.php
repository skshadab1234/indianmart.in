<?php 
include('top.php');

$msg="";
$category_id="";
$dish="";
$dish_detail="";
$image="";
$type="";
$cat_menu_select = "";
$id="";
$image_status='required';
$image_error="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from dish where id='$id'"));
	$category_id=$row['category_id'];
	$dish=$row['dish'];
	$type=$row['type'];
	$cat_menu_select=$row['cat_menu'];
	$dish_detail=$row['dish_detail'];
	$image=$row['image'];
	$image_status='';
}

if(isset($_GET['dish_details_id']) && $_GET['dish_details_id']>0){
	$dish_details_id=get_safe_value($_GET['dish_details_id']);
	$id=get_safe_value($_GET['id']);
	mysqli_query($con,"delete from dish_details where id='$dish_details_id'");
	redirect('manage_dish.php?id='.$id);
}

if(isset($_POST['submit'])){
	$category_id=get_safe_value($_POST['category_id']);
	$dish=get_safe_value($_POST['dish']);
	$dish_detail=get_safe_value($_POST['dish_detail']);
	$food_type=get_safe_value($_POST['type']);
	$added_on=date('Y-m-d h:i:s');
	$cat_menu = $_POST['menu_category'];
	
	if($id==''){
		$sql="select * from dish where dish='$dish'";
	}else{
		$sql="select * from dish where dish='$dish' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Dish already added";
	}else{
		$type=$_FILES['image']['type'];
		if($id==''){
			if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format";
			}else{
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],SERVER_DISH_IMAGE.$image);
				mysqli_query($con,"insert into dish(category_id,dish,dish_detail,cat_menu,status,added_on,image,type) values('$category_id','$dish','$dish_detail','$cat_menu',1,'$added_on','$image','$food_type')");
				$did=mysqli_insert_id($con);
				
				$attributeArr=$_POST['attribute'];
				$priceArr=$_POST['price'];
				$statusArr=$_POST['status'];
				
				foreach($attributeArr as $key=>$val){
					$attribute=$val;
					$price=$priceArr[$key];
					$status=$statusArr[$key];
					mysqli_query($con,"insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price','$status','$added_on')");
					//echo "insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')";
				}
				
				redirect('dish.php');
			}
		}else{
			$image_condition='';
			if($_FILES['image']['name']!=''){
				if($type!='image/jpeg' && $type!='image/png'){
					$image_error="Invalid image format";
				}else{
					$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],SERVER_DISH_IMAGE.$image);
					$image_condition=", image='$image'";
					
					$oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select image from dish where id='$id'"));
					$oldImage=$oldImageRow['image'];
					unlink(SERVER_DISH_IMAGE.$oldImage);
		
				}
			}
			if($image_error==''){

				// prx("update dish set cat_menu = '$imploade_menu',category_id='$category_id', dish='$dish' , dish_detail='$dish_detail',type='$food_type' $image_condition where id='$id'");
				$sql="update dish set cat_menu = '$cat_menu',category_id='$category_id', dish='$dish' , dish_detail='$dish_detail',type='$food_type' $image_condition where id='$id'";
				mysqli_query($con,$sql);
				$attributeArr=$_POST['attribute'];
				$priceArr=$_POST['price'];
				$statusArr=$_POST['status'];
				$dishDetailsIdArr=$_POST['dish_details_id'];
				
				foreach($attributeArr as $key=>$val){
					$attribute=$val;
					$price=$priceArr[$key];
					$status=$statusArr[$key];
					
					if(isset($dishDetailsIdArr[$key])){
						$did=$dishDetailsIdArr[$key];
						mysqli_query($con,"update dish_details set attribute='$attribute',price='$price',status='$status' where id='$did'");
					}else{
						mysqli_query($con,"insert into dish_details(dish_id,attribute,price,status,added_on) values('$id','$attribute','$price','$status','$added_on')");
					}
					
					
					//echo "insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')";
				}
				
				
				redirect('dish.php');	
			}
		}
	}
}
$res_category=mysqli_query($con,"select * from category where status='1' order by category asc");
$arrType=array("veg","non-veg");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="template_admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="template_admin/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="template_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="template_admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="template_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="template_admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="template_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="template_admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template_admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
                        <h1 class="m-0 text-dark">Manage Dish <?=  ':- '.$dish ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Dish</li>
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
                      <select class="form-control select2" name="category_id" required>
						<option value="">Select Category</option>
						<?php
						while($row_category=mysqli_fetch_assoc($res_category)){
							if($row_category['id']==$category_id){
								echo "<option value='".$row_category['id']."' selected>".$row_category['category']."</option>";
							}else{
								echo "<option value='".$row_category['id']."'>".$row_category['category']."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Dish</label>
                      <input type="text" class="form-control" placeholder="dish" name="dish" required value="<?php echo $dish?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Type</label>
                      <select class="form-control select2" name="type" required>
						<option value="">Select Type</option>
						<?php 
						foreach($arrType as $list){
							if($list==$type){
								echo "<option value='$list' selected>".strtoupper($list)."</option>";
							}else{
								echo "<option value='$list'>".strtoupper($list)."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>

 					<div class="form-group">
                  <label>Add Special, Dinner, Lunch and more</label>
                  <select class="form-control select2"  name="menu_category" style="width: 100%;">
                   <?php
                     $getcatmenu =  getcatmenu();
                     $arrdish = array("Special","Lunch","Breakfast","Dinner");
                     foreach ($arrdish as $catmenu_val) {
                     		if($catmenu_val==$cat_menu_select){
								echo "<option value=".$catmenu_val." selected>".strtoupper($catmenu_val)."</option>";
							}else{
								echo "<option value=".$catmenu_val.">".strtoupper($catmenu_val)."</option>";
							}
                     ?>
                      <?php } ?>
                  </select>
                </div>

                  
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Dish Detail</label>
                      <textarea name="dish_detail" class="form-control" placeholder="Dish Detail"><?php echo $dish_detail?></textarea>
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail3">Dish Image</label>
                      <input type="file" class="form-control" placeholder="Dish Image" name="image" <?php echo $image_status?>>
					  <div class="error mt8"><?php echo $image_error?></div>
                    </div>
					<div class="form-group" id="dish_box1">
						<label for="exampleInputEmail3">Dish Attributes</label>
					<?php if($id==0){?>
						<div class="row">
							<div class="col-4">
								<input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required>
							</div>
							<div class="col-3">
								<input type="text" class="form-control" placeholder="Price" name="price[]" required>
							</div>
							<div class="col-3">
								<select required name="status[]" class="form-control">
									<option value="">Select Status</option>
									<option value="1">Active</option>
									<option value="0">Deactive</option>
								</select>
							</div>
						</div>
					<?php } else{
						$dish_details_res=mysqli_query($con,"select * from dish_details where dish_id='$id'");
						$ii=1;
						while($dish_details_row=mysqli_fetch_assoc($dish_details_res)){
						?>
						<div class="row mt8">
							<div class="col-4">
								<input type="hidden" name="dish_details_id[]" value="<?php echo $dish_details_row['id']?>">
								<input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required value="<?php echo $dish_details_row['attribute']?>">
							</div>
							<div class="col-3">
								<input type="text" class="form-control" placeholder="Price" name="price[]" required  value="<?php echo $dish_details_row['price']?>">
							</div>
							<div class="col-3">
								<select required name="status[]" class="form-control">
									<option value="">Select Status</option>
									<?php
									if($dish_details_row['status']==1){
									?>
										<option value="1" selected>Active</option>
										<option value="0">Deactive</option>
									<?php } ?>
									<?php
									if($dish_details_row['status']==0){
									?>
										<option value="1">Active</option>
										<option value="0" selected>Deactive</option>
									<?php } ?>
								</select>
							</div>
							<?php if($ii!=1){
							?>
							<div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick="remove_more_new('<?php echo $dish_details_row['id']?>')">Remove</button></div>
							
							<?php
							}
							?>
						</div>
					<?php 
					$ii++;
					} } ?>
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
					<button type="button" class="btn badge-danger mr-2" onclick="add_more()">Add More</button>
                  </form>
              

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
         <input type="hidden" id="add_more" value="1"/>
        <script>
		function add_more(){
			var add_more=jQuery('#add_more').val();
			add_more++;
			jQuery('#add_more').val(add_more);
			var html='<div class="row" style="margin-top:10px" id="box'+add_more+'"><div class="col-4"><input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required></div><div class="col-3"><input type="text" class="form-control" placeholder="Price" name="price[]" required></div><div class="col-3"><select class="form-control"  required name="status[]"><option value="">Select Status</option><option value="1">Active</option><option value="0">Deactive</option></select></div><div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';
			jQuery('#dish_box1').append(html);
		}
		
		function remove_more(id){
			jQuery('#box'+id).remove();
		}
		
		function remove_more_new(id){
			var result=confirm('Are you sure?');
			if(result==true){
				var cur_path=window.location.href;
				window.location.href=cur_path+"&dish_details_id="+id;
			}
		}	
		</script>
         <?php include 'footer.php'; ?>

<!-- jQuery -->
<script src="template_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="template_admin/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstratemplate_admin/llistbox -->
<script src="template_admin/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="template_admin/plugins/moment/moment.min.js"></script>
<script src="template_admin/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="template_admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="template_admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="template_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="template_admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="template_admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="template_admin/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
      </div>
  </div>
      <!-- ./wrapper -->
   </body>
</html>