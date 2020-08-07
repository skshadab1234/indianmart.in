<?php 
include('top.php');
$msg="";
$category_id ="";
$subcategory="";
$id="";
$image_required = "required";
if(isset($_GET['id']) && $_GET['id']>0){
  $image_required = "";
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from subcategory where id='$id'"));
	$subcategory=$row['subcatgeory_name'];
  $category_id  = $row['cat_id_of_subcat'];
}

if(isset($_POST['submit'])){
	$subcategory=get_safe_value($_POST['subcategory_data']);
	$added_on=date('Y-m-d h:i:s');
  $cat_id_of_subcat=get_safe_value($_POST['cat_id_of_subcat']);
	
    $subcategory_image = $_FILES['subcategory_image']['name'];
     if (!empty($subcategory_image)) {
        $profile = time().'_'.$subcategory_image;
     $target = "../media/subcategory/".$profile;
     move_uploaded_file($_FILES['subcategory_image']['tmp_name'], $target);
     $subcategory_image = $profile;
     }else{
      $subcategory_image = $row['subcategory_image'];
     }

	if($id==''){
		$sql="select * from subcategory where subcategory_name='$subcategory'";
	}else{
		$sql="select * from subcategory where subcategory_name='$subcategory' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Category already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into subcategory(subcategory_name,subcategory_img,cat_id_of_subcat,status,added_on) values('$subcategory','$subcategory_image','$cat_id_of_subcat',1,'$added_on')");
		}else{
			mysqli_query($con,"update subcategory set subcatgeory_name='$subcategory',subcategory_img='$subcategory_img', cat_id_of_subcat = $cat_id_of_subcat where id='$id'");
		}
		
		redirect('subcategory.php');
	}
}
$res_category=mysqli_query($con,"select * from category where category_status='1' order by id asc");

?>
<!DOCTYPE html>
<html lang="en">
   <head>
  <link rel="stylesheet" href="admin/template_admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="admin/template_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <style type="text/css">
    .select2-container--default .select2-selection--single {
      height: 40px;
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
                        <h1 class="m-0 text-dark">Manage Subcategory :- <?= $subcategory ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Subcategory </li>
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
                      <label for="exampleInputName1">Subcategory Name</label>
                      <input type="text" class="form-control" placeholder="subcategory" name="subcategory_data" required value="<?php echo $subcategory?>">
					  <div class="error mt8"><?php echo $msg?></div>
                    </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1">Subcategory Image</label>
                    <input type="file" name="subcategory_image"  class="form-control" <?= $image_required ?> >
                  </div>

                   <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select class="form-control select2" name="cat_id_of_subcat" required>
            <option value="">Select Category</option>
            <?php
            while($row_category=mysqli_fetch_assoc($res_category)){
              if($row_category['id']==$category_id){
                echo "<option value='".$row_category['id']."' selected>".$row_category['catgeory_name']."</option>";
              }else{
                echo "<option value='".$row_category['id']."'>".$row_category['catgeory_name']."</option>";
              }
            }
            ?>
            </select>
            
                    </div>
                  <div class="form-group" style="background-image: url(<?= SITE_SUBCATEGORY_IMAGE.$row['subcategory_img'] ?>);background-repeat: no-repeat;background-size: contain;width: 40px;height: 40px">
                    
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
         <!-- Select2 -->
<script src="admin/template_admin/plugins/select2/js/select2.full.min.js"></script>
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