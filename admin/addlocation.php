<?php 
   include('top.php');
   if(isset($_GET['addlocation']) && $_GET['addlocation']>0 && $_GET['order_id']){
      
      $id=get_safe_value($_GET['addlocation']);
      $oid=get_safe_value($_GET['order_id']);
      $status = '';
     $getaddlocationTracker = getaddlocationTracker($id,$oid);
     // prx($getaddlocationTracker);
      if(isset($_POST['submit'])){
  $location=get_safe_value($_POST['location']);
  $added_on=date('Y-m-d h:i:s');
  
  
    if($id==''){

    }else{
      // prx("update track_details set arrived_at='$location', added_on='$added_on' where message='$id' and order_id = '$oid'");
      mysqli_query($con,"update track_details set arrived_at='$location', added_on='$added_on' where message='$id' and order_id = '$oid'");
    }
    
    redirect('order_detail.php?id='.$oid.'');
}
      }
      ?>
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Admin Panel</title>
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
                        <h1 class="m-0 text-dark">It is <?php foreach ($getaddlocationTracker as  $value) {echo $value['order_status'].''.$value['delay_msg'];}  ?> add exact location.</h1>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Add Money</li>
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
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                     <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Add location</label>
                      <input type="text" class="form-control" placeholder="location" name="location" required value="<?php echo $status?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit"><i class="fa fa-plus"></i>  Add</button>
                  </form>
                </div>
              </div>
            </div>
            
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