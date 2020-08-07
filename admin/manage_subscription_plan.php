<?php 
include('top.php');

$msg="";
$subscription_plan_name="";
$enquires_name="";
$no_of_enquires="";
$plan_duration_date="";
$plan_price_acc_date="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
  $id=get_safe_value($_GET['id']);
  $row=mysqli_fetch_assoc(mysqli_query($con,"select * from subscription_plan where id='$id'"));
  $subscription_plan_name=$row['subscription_plan_name'];
  $plan_type = $row['plan_type'];
}

if(isset($_GET['dish_details_id']) && $_GET['dish_details_id']>0){
  $dish_details_id=get_safe_value($_GET['dish_details_id']);
  $id=get_safe_value($_GET['id']);
  mysqli_query($con,"delete from subscription_plan where id='$dish_details_id'");
  redirect('manage_subscription_plan.php?id='.$id);
}

if(isset($_POST['submit'])){
  $subscription_plan_name=get_safe_value($_POST['subscription_plan_name']);
  $plan_type=get_safe_value($_POST['plan_type']);
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
        mysqli_query($con,"insert into subscription_plan(subscription_plan_name,plan_type,status,added_on) values('$subscription_plan_name','$plan_type',1,'$added_on')");
        $did=mysqli_insert_id($con);
        
        $enquires_name=$_POST['enquires_name'];
        $no_of_enquires=$_POST['no_of_enquires'];
        $plan_duration_date=$_POST['plan_duration_date'];
        $plan_price_acc_date=$_POST['plan_price_acc_date'];
        $statusArr=$_POST['status'];
        
        foreach($enquires_name as $key=>$val){
          $enquires_name=$val;
          $no_of_enquires=$no_of_enquires[$key];
          $plan_duration_date=$plan_duration_date[$key];
          $plan_price_acc_date=$plan_price_acc_date[$key];
          $status=$statusArr[$key];
          mysqli_query($con,"insert into subscription_details(subscription_plan_id,enquires_name,no_of_enquires,plan_duration_date,plan_price_acc_date,status,added_on) values('$did','$enquires_name','$no_of_enquires','$plan_duration_date','$plan_price_acc_date','$status','$added_on')");
          //echo "insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')";
        }
        
        redirect('subscription_plan.php');
      }
    else{

        // prx("update dish set cat_menu = '$imploade_menu',category_id='$category_id', dish='$dish' , dish_detail='$dish_detail',type='$food_type' $image_condition where id='$id'");
        $sql="update subscription_plan set subscription_plan_name = '$subscription_plan_name',plan_type='$plan_type' where id='$id'";
        mysqli_query($con,$sql);

        $enquires_name=$_POST['enquires_name'];
        $no_of_enquires=$_POST['no_of_enquires'];
        $plan_duration_date=$_POST['plan_duration_date'];
        $plan_price_acc_date=$_POST['plan_price_acc_date'];
        $statusArr=$_POST['status'];
        $dishDetailsIdArr=$_POST['dish_details_id'];
        
        foreach($enquires_name as $key=>$val){
          $enquires_name=$val;
          $no_of_enquires=$no_of_enquires[$key];
          $plan_duration_date=$plan_duration_date[$key];
          $plan_price_acc_date=$plan_price_acc_date[$key];
          $status=$statusArr[$key];
          
          if(isset($dishDetailsIdArr[$key])){
            $did=$dishDetailsIdArr[$key];
            mysqli_query($con,"update subscription_details set enquires_name='$enquires_name',no_of_enquires='$no_of_enquires',plan_duration_date='$plan_duration_date',plan_price_acc_date='$plan_price_acc_date',status='$status' where id='$did'");
          }else{
            mysqli_query($con,"insert into subscription_details(subscription_plan_id,enquires_name,no_of_enquires,plan_duration_date,plan_price_acc_date,status,added_on) values('$id','$enquires_name','$no_of_enquires','$plan_duration_date','$plan_price_acc_date','$status','$added_on')");
          }
          
          
          //echo "insert into dish_details(dish_id,attribute,price,status,added_on) values('$did','$attribute','$price',1,'$added_on')";
        }
        
        
        redirect('subscription_plan.php'); 
      }
    }
  }
$plan_namearr=array("popular","Silver","Diamond","Free");

$plan_durationarr=array("365 days","91 days","30 days","Free");

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
   <!-- summernote -->
  <link rel="stylesheet" href="template_admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
                        <h1 class="m-0 text-dark">Manage Subscription <?=  ':- '.$subscription_plan_name ?></h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Manage Subscription</li>
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
                      <label for="exampleInputName1">Plan Name</label>
                      <select class="select2" name="subscription_plan_name"  style="width: 100%">
                      <option value="">Select Plan</option>
                     <?php 
                      foreach($plan_namearr as $list){
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
                      <label for="exampleInputName1">Set it as popular</label>
                      <select class="select2" name="plan_type"  style="width: 100%">
                      <option value="">Select Any</option>
                        <?php
                        $typearr =  array("yes", "no");
                         foreach($typearr as $list){
                         if($list==$plan_type){
                          echo "<option value='$list' selected>".strtoupper($list)."</option>";
                        }else{
                          echo "<option value='$list'>".strtoupper($list)."</option>";
                        }
                      }
                        ?>   
                        
                      
                      </select>
            <div class="error mt8"><?php echo $msg?></div>
                    </div>

          <div class="form-group" id="dish_box1">
            <label for="exampleInputEmail3">Plan  Attributes</label>
       <?php
            $dish_details_res=mysqli_query($con,"select * from subscription_details where subscription_plan_id='$id'");
            $ii=1;
            while($dish_details_row=mysqli_fetch_assoc($dish_details_res) > 0){
              $plan_duration_date = $dish_details_row['plan_duration_date']
            ?>
            <div class="row">
              <div class="col-3">
                <input type="hidden" name="dish_details_id[]" value="<?php echo $dish_details_row['id']?>">
                <input type="text" class="form-control" style="margin-top: 10px" placeholder="Any thing Type" name="enquires_name[]"  value="<?php echo $dish_details_row['enquires_name']?>">
              </div>

              <div class="col-3">
                <input type="text" class="form-control" style="margin-top: 10px" placeholder="Please type something" name="no_of_enquires[]"   value="<?php echo $dish_details_row['no_of_enquires']?>">
              </div>
              <div class="col-3">
               <select  name="plan_duration_date[]" class="form-control select2" required=""  style="margin-top: 20px">
                  <option value="" disabled="" selected="">Select Plan Duration</option>
                    <?php 
                      foreach($plan_durationarr as $list){
                        if($list==$plan_duration_date){
                          echo "<option value='$list' selected>".strtoupper($list)."</option>";
                        }else{
                          echo "<option value='$list'>".strtoupper($list)."</option>";
                        }
                      }
                      ?>
                    </select>
              </div>

              <div class="col-3">
                <input type="text" class="form-control" style="margin-top: 10px" placeholder="Plan Price" name="plan_price_acc_date[]"   value="<?php echo $dish_details_row['plan_price_acc_date']?>">
              </div>
              <div class="col-3">
                <select  name="status[]" style="margin-top: 10px" class="form-control">
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
          }  ?>
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
      var html='<div class="row"  id="box'+add_more+'"><div class="col-3"><input type="text" class="form-control" style="margin:10px" placeholder="Any Thing" name="enquires_name[]" ></div><div class="col-3"><input type="text" class="form-control" style="margin:10px" placeholder="Please Type Some Thing" name="no_of_enquires[]" ></div><div class="col-3"><select  name="plan_duration_date[]" class="form-control" required=""  style="margin-top: 20px"><option value="" disabled="" selected="">Select Plan Duration</option><option value="30 days" >30 days</option><option value="91 days">91 days</option><option value="Free">Free </option><option value="365 days">365 days</option></select></div><div class="col-3"><input type="text" class="form-control" style="margin:10px" placeholder="Old Price" name="old_price[]" ></div><div class="col-3"><select class="form-control" style="margin:10px"   name="status[]"><option value="">Select Status</option><option value="1">Active</option><option value="0">Deactive</option></select></div><div class="col-2"><button type="button" class="btn badge-danger mr-2" onclick=remove_more("'+add_more+'")>Remove</button></div></div>';
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
<script src="template_admin/plugins/summernote/summernote-bs4.min.js"></script>
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