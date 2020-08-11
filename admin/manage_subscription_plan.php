<?php 
include('top.php');
$msg="";
$subscription_plan_name ="";
$plan_price="";
$plan_expire="";
$no_of_enquires="";
$plan_type="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
  $image_required = "";
  $id=get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc(mysqli_query($con,"select * from subscription_plan where id='$id'"));
  $subscription_plan_name=$row['subscription_plan_name'];
  $plan_price  = $row['plan_price'];
  $plan_expire  = $row['plan_expire'];
  $no_of_enquires  = $row['no_of_enquires'];
  $plan_type  = $row['plan_type'];
}

if(isset($_POST['submit'])){
  $subscription_plan_name=get_safe_value($_POST['subscription_plan_name']);
  $plan_price=get_safe_value($_POST['plan_price']);
  $plan_expire=get_safe_value($_POST['plan_expire']);
  $plan_type=get_safe_value($_POST['plan_type']);
  $no_of_enquires=get_safe_value($_POST['no_of_enquires']);
  $added_on=date('Y-m-d h:i:s');
  
  if($id==''){
    $sql="select * from subscription_plan where subscription_plan_name='$subscription_plan_name'";
  }else{
    $sql="select * from subscription_plan where subscription_plan_name='$subscription_plan_name' and id!='$id'";
  } 
  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
    $msg="Plan already added";
  }else{
    if($id==''){
      mysqli_query($con,"insert into subscription_plan(subscription_plan_name,plan_price,plan_expire,plan_type,no_of_enquires,status,added_on) values('$subscription_plan_name','$plan_price','$plan_expire','$plan_type','$no_of_enquires',1,'$added_on')");
    }else{
      mysqli_query($con,"update subscription_plan set subscription_plan_name='$subscription_plan_name',plan_price='$plan_price', plan_expire = '$plan_expire',plan_type='$plan_type',no_of_enquires='$no_of_enquires' where id='$id'");
    }
    
    redirect('subscription_plan.php');
  }
}

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
                        <h1 class="m-0 text-dark">Manage Subscription :- <?= $subscription_plan_name ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Subscription </li>
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
                     <select class="form-control select2" name="subscription_plan_name">
                       <option selected="" disabled="">Select Subscription plan</option>
                       <?php 
                       $plan_arr = array("Popular", "Basic", "Free");
                      foreach($plan_arr as $list){
                        if($list==$subscription_plan_name){
                          echo "<option value='$list' selected>".strtoupper($list)."</option>";
                        }else{
                          echo "<option value='$list'>".strtoupper($list)."</option>";
                        }
                      }
                      ?>
                     </select>
            <div class="error mt8"><?php echo $msg?></div>
                    </div>


                   <div class="form-group">
                      <label for="exampleInputName1">Total Enquiry</label>
                      <input type="text" name="no_of_enquires" class="form-control" placeholder="Number of Enquiry" value="<?= $no_of_enquires ?>">  
                    </div>


                   <div class="form-group">
                      <label for="exampleInputName1">Plan Price</label>
                      <input type="text" name="plan_price" class="form-control" placeholder="Plan Price" value="<?= $plan_price ?>">  
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Plan Expire</label>
                        <select class="form-control select2" name="plan_expire">
                       <option selected="" disabled="">Set Expiration Time</option>
                       <?php 
                       $plan_arr = array("365 days", "91 days", "30 days", "7 days trial");
                      foreach($plan_arr as $list){
                        if($list==$plan_expire){
                          echo "<option value='$list' selected>".strtoupper($list)."</option>";
                        }else{
                          echo "<option value='$list'>".strtoupper($list)."</option>";
                        }
                      }
                      ?>
                     </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Set as Popular</label>
                        <select class="form-control select2" name="plan_type">
                       <option selected="" disabled="">Select any one</option>
                       <?php 
                       $plantype_arr = array("yes","no");
                      foreach($plantype_arr as $list){
                        if($list==$plan_type){
                          echo "<option value='$list' selected>".strtoupper($list)."</option>";
                        }else{
                          echo "<option value='$list'>".strtoupper($list)."</option>";
                        }
                      }
                      ?>
                     </select>
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