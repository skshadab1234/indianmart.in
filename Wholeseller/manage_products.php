<?php 
include('top.php');
$sid = $wholeseller['id'];
$msg="";
$cat_id="";
$sub_catid="";
$product_name="";
$prod_img="";
$unit_price="";
$original_price = "";
$shipping_cost = "";
$product_measure = "";
$quantity = "";
$added_by = "";
$description = "";
$id="";
$image_status='required';
$image_error="";
if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from products where id='$id'"));
	$cat_id=$row['cat_id'];
	$sub_catid=$row['sub_catid'];
	$product_name	=$row['product_name'];
	$description=$row['description'];
	$prod_img=$row['prod_img'];
	$shipping_cost=$row['shipping_cost'];
	$product_measure=$row['product_measure'];
	$added_by=$row['added_by'];
	$image_status='';
}

if(isset($_GET['dish_details_id']) && $_GET['dish_details_id']>0){
	$dish_details_id=get_safe_value($_GET['dish_details_id']);
	$id=get_safe_value($_GET['id']);
	mysqli_query($con,"delete from product_details where id='$dish_details_id'");
	redirect('manage_products.php?id='.$id);
}

if(isset($_POST['submit'])){
	$cat_id=get_safe_value($_POST['cat_id']);
	$sub_catid=get_safe_value($_POST['sub_catid']);
	$product_name=get_safe_value($_POST['product_name']);
	$description=get_safe_value($_POST['description']);
	$shipping_cost=get_safe_value($_POST['shipping_cost']);
	$product_measure=get_safe_value($_POST['product_measure']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from products where product_name='$product_name'";
	}else{
		$sql="select * from products where product_name='$product_name' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Product already added";
	}else{
		$type=$_FILES['image']['type'];
		if($id==''){
			if($type!='image/jpeg' && $type!='image/png'){
				$image_error="Invalid image format";
			}else{
				$prod_img=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],"../media/products/".$prod_img);
				mysqli_query($con,"insert into products(cat_id,sub_catid,product_name,description,prod_img,shipping_cost,product_measure,status,added_by,added_on) values('$cat_id','$sub_catid','$product_name','$description','$prod_img','$shipping_cost','$product_measure',1,'$sid','$added_on')");
				$did=mysqli_insert_id($con);
				
				$attributeArr=$_POST['attribute'];
				$qtyarr=$_POST['qty'];
				$priceArr=$_POST['price'];
				$oldpriceArr=$_POST['old_price'];
				$statusArr=$_POST['status'];
				
				foreach($attributeArr as $key=>$val){
					$attribute=$val;
					$qty=$qtyarr[$key];
					$price=$priceArr[$key];
					$oldprice=$oldpriceArr[$key];
					$status=$statusArr[$key];
					mysqli_query($con,"insert into product_details(product_id,attribute,price,old_price,qty,status,added_on) values('$did','$attribute','$price','$oldprice','$qty','$status','$added_on')");
				}
				
				redirect('wholeseller_products.php');
			}
		}else{
			$image_condition='';
			if($_FILES['image']['name']!=''){
				if($type!='image/jpeg' && $type!='image/png'){
					$image_error="Invalid image format";
				}else{
					$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'],"../media/products/".$image);
					$image_condition=", prod_img='$image'";
					
					$oldImageRow=mysqli_fetch_assoc(mysqli_query($con,"select prod_img from products where id='$id'"));
					$oldImage=$oldImageRow['image'];
					unlink(SERVER_DISH_IMAGE.$oldImage);
		
				}
			}
			if($image_error==''){

				// prx("update dish set cat_menu = '$imploade_menu',category_id='$category_id', dish='$dish' , dish_detail='$dish_detail',type='$food_type' $image_condition where id='$id'");
				$sql="update products set cat_id = '$cat_id',sub_catid='$sub_catid', product_name='$product_name', description='$description' $image_condition, shipping_cost = '$shipping_cost', product_measure='$product_measure' where id='$id'";
				mysqli_query($con,$sql);
				$attributeArr=$_POST['attribute'];
				$qtyArr=$_POST['qty'];
				$priceArr=$_POST['price'];
				$oldpriceArr=$_POST['old_price'];
				$statusArr=$_POST['status'];
				$dishDetailsIdArr=$_POST['dish_details_id'];
				
				foreach($attributeArr as $key=>$val){
					$attribute=$val;
					$qty=$qtyArr[$key];
					$price=$priceArr[$key];
					$oldprice=$oldpriceArr[$key];
					$status=$statusArr[$key];
					
					if(isset($dishDetailsIdArr[$key])){
						$did=$dishDetailsIdArr[$key];
						mysqli_query($con,"update product_details set attribute='$attribute',qty='$qty',price='$price',old_price='$oldprice',status='$status' where id='$did'");
					}else{
						mysqli_query($con,"insert into product_details(product_id,attribute,qty,price,old_price,status,added_on) values('$id','$attribute','$qty','$price','$oldprice','$status','$added_on')");
					}
					
					
					//echo "insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')";
				}
				
				
				redirect('wholeseller_products.php');	
			}
		}
	}
}
$res_category=mysqli_query($con,"select * from category where category_status='1' order by id asc");
$res_subcategory=mysqli_query($con,"select * from Subcategory where status='1' order by id asc");
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
  <link rel="stylesheet" href="../admin/template_admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../admin/template_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/template_admin/dist/css/adminlte.min.css">
   <!-- summernote -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/summernote/summernote-bs4.css">
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
                        <h1 class="m-0 text-dark">Manage Dish <?=  ':- '.$product_name ?></h1>
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
                      <select class="select2" name="cat_id" required style="width: 100%">
						<option value="">Select Category</option>
						<?php
						while($row_category=mysqli_fetch_assoc($res_category)){
							if($row_category['id']==$cat_id){
								echo "<option value='".$row_category['id']."' selected>".$row_category['catgeory_name']."</option>";
							}else{
								echo "<option value='".$row_category['id']."'>".$row_category['catgeory_name']."</option>";
							}
						}
						?>
					  </select>
                    </div>

                    <!-- subcategory -->
                      <div class="form-group" style="width: 100%">
                      <label for="exampleInputName1">Subcategory</label>
                      <select class="select2" name="sub_catid" required style="width: 100%">
						<option value="">Select Subcategory</option>
						<?php
						while($row_subcategory=mysqli_fetch_assoc($res_subcategory)){
							if($row_subcategory['id']==$sub_catid){
								echo "<option value='".$row_subcategory['id']."' selected>".$row_subcategory['subcategory_name']."</option>";
							}else{
								echo "<option value='".$row_subcategory['id']."'>".$row_subcategory['subcategory_name']."</option>";
							}
						}
						?>
					  </select>
					  
                    </div>
					<div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" placeholder="Product Name" name="product_name" required value="<?php echo $product_name?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                  <textarea class="textarea" placeholder="Place some text here"  name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  required>
                  	<?= $description ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Shipping Cost</label>
                      	<input type="text"  class="form-control" placeholder="Shipping Cost" name="shipping_cost" required value="<?php echo $shipping_cost?>">
                    </div>

                      <div class="form-group">
                      <label for="exampleInputName1">Product Measure</label>
                      	<input type="text"  class="form-control" placeholder="Product Measure" name="product_measure" required value="<?php echo $product_measure?>">
                    </div>


					<div class="form-group">
                      <label for="exampleInputEmail3">Product Image</label>
                      <input type="file" class="form-control" placeholder="Product Image" name="image" <?php echo $image_status?>>
					  <div class="error mt8"><?php echo $image_error?></div>
                    </div>

					<div class="form-group" id="dish_box1">
						<label for="exampleInputEmail3">Products Attributes</label>
					<?php if($id==0){?>
						<div class="row">
							<div class="col-3">
								<input type="text" class="form-control" placeholder="Attribute" name="attribute[]" required  style="margin:10px">
							</div>
							<div class="col-3">
								<input type="text" class="form-control" placeholder="qty" name="qty[]" required style="margin:10px">
							</div>
							<div class="col-3">
								<input type="text" class="form-control" placeholder="Price" name="price[]" required style="margin:10px">
							</div>
							<div class="col-3">
								<input type="text" class="form-control" placeholder="old price" name="old_price[]" required style="margin:10px">
							</div>
							<div class="col-3">
								<select required name="status[]" class="form-control" style="margin:10px">
									<option value="">Select Status</option>
									<option value="1">Active</option>
									<option value="0">Deactive</option>
								</select>
							</div>
						</div>
					<?php } else{
						$dish_details_res=mysqli_query($con,"select * from product_details where product_id='$id'");
						$ii=1;
						while($dish_details_row=mysqli_fetch_assoc($dish_details_res)){
						?>
						<div class="row">
							<div class="col-3">
								<input type="hidden" name="dish_details_id[]" value="<?php echo $dish_details_row['id']?>">
								<input type="text" class="form-control" style="margin-top: 10px" placeholder="Attribute" name="attribute[]" required value="<?php echo $dish_details_row['attribute']?>">
							</div>

							<div class="col-3">
								<input type="text" class="form-control" style="margin-top: 10px" placeholder="Qty" name="qty[]" required  value="<?php echo $dish_details_row['qty']?>">
							</div>
							<div class="col-3">
								<input type="text" class="form-control" style="margin-top: 10px" placeholder="Price" name="price[]" required  value="<?php echo $dish_details_row['price']?>">
							</div>

							<div class="col-3">
								<input type="text" class="form-control" style="margin-top: 10px" placeholder="Old Price" name="old_price[]" required  value="<?php echo $dish_details_row['old_price']?>">
							</div>
							<div class="col-3">
								<select required name="status[]" style="margin-top: 10px" class="form-control">
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
							<div class="col-2"><button type="button" style="margin-top: 10px" class="btn badge-danger mr-2" onclick="remove_more_new('<?php echo $dish_details_row['id']?>')">Remove</button></div>
							
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
			var html='<div class="row"  id="box'+add_more+'"><div class="col-3"><input type="text" class="form-control" style="margin:10px" placeholder="Attribute" name="attribute[]" required></div><div class="col-3"><input type="text" class="form-control" style="margin:10px" placeholder="Qty" name="qty[]" required></div><div class="col-3"><input type="text" class="form-control" style="margin:10px" placeholder="Price" name="price[]" required></div><div class="col-3"><input type="text" class="form-control" style="margin:10px" placeholder="Old Price" name="old_price[]" required></div><div class="col-3"><select class="form-control" style="margin:10px"  required name="status[]"><option value="">Select Status</option><option value="1">Active</option><option value="0">Deactive</option></select></div><div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';
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

<!-- Summernote -->
<script src="../admin/template_admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
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