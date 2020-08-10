<?php 
include('top.php');

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id']>0){
	$type=get_safe_value($_GET['type']);
	$id=get_safe_value($_GET['id']);
	if($type=='delete'){
		mysqli_query($con,"delete from subscription_plan where id='$id'");
		redirect('subscription_plan.php');
	}
	if($type=='active' || $type=='deactive'){
		$status=1;
		if($type=='deactive'){
			$status=0;
		}
		mysqli_query($con,"update subscription_plan set status='$status' where id='$id'");
		redirect('subscription_plan.php');
	}

}

$sql="select * from subscription_plan order by id";
$res=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <style type="text/css">
     

.pricing {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-top: 6%;
}
.pricing .plan {
  background-color: #fff;
  padding: 2.5rem;
  margin: 12px;
  border-radius: 5px;
  text-align: center;
  transition: 0.3s;
  cursor: pointer;
}
.pricing .plan h2 {
  font-size: 22px;
  margin-bottom: 12px;
}
.pricing .plan .price {
  margin-bottom: 1rem;
  font-size: 30px;
}
.pricing .plan ul.features {
  list-style-type: none;
  text-align: left;
}
.pricing .plan ul.features li {
  margin: 8px;
}
.pricing .plan ul.features li .fas {
  margin-right: 4px;
}
.pricing .plan ul.features li .fa-check-circle {
  color: #6ab04c;
}
.pricing .plan ul.features li .fa-times-circle {
  color: #eb4d4b;
}
.pricing .plan.popular {
  border: 2px solid #6ab04c;
  position: relative;
  transform: scale(1.08);
}
.pricing .plan.popular span {
  position: absolute;
  top: -20px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #6ab04c;
  color: #fff;
  padding: 4px 20px;
  font-size: 18px;
  border-radius: 5px;
}
.pricing .plan:hover {
  box-shadow: 5px 7px 67px -28px rgba(0, 0, 0, 0.37);
}

.tools {
      margin-top: 4px;
    justify-content: center;
    align-items: center;
    display: flex;
}

.tools a{
  border: none;
  width: 100%;
  padding: 12px 35px;
  margin: 2px;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
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
                        <h1 class="m-0 text-dark">Subscription Plan<a href='manage_subscription_plan.php' class="btn btn-app"><i class="fas fa-edit"></i> Add New</a></h1>
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
    <div class="pricing">
      <?php if(mysqli_num_rows($res)>0){
        while ($row = mysqli_fetch_assoc($res)) {
          $popular = "";
          if ($row['plan_type'] == "yes") {
            $popular = "popular";
          }
          ?>
        <div class="plan <?= $popular ?>">
          <?php 
            if ($row['plan_type'] == "yes") {
          ?>
                  <span>Most Popular</span>
          <?php }
          ?>
              <h2><?= $row['subscription_plan_name'] ?></h2>
              <div class="price"></div>
              <ul class="features">
                <li><i class="fas fa-check-circle"></i><?= $row['no_of_enquires'] ?> Enquires Just in <?= '₹ '.number_format($row['plan_price'],1) ?> For <?= $row['plan_expire'] ?></li>
              </ul>
              
                <div class="tools">  
                <a href="manage_subscription_plan.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
               <?php
                if($row['status']==1){
                ?>
                <a href="?id=<?php echo $row['id']?>&type=deactive"  class="btn btn-success" >Active</a>
                <?php
                }else{
                ?>
                <a href="?id=<?php echo $row['id']?>&type=active"  class="btn btn-danger">Deactive</a>
                <?php
                }
                
                ?>
              <a href="?id=<?php echo $row['id']?>&type=delete" class="btn btn-danger">Delete</a>
                </div>
            </div>  
          <?php
        }
      }
      ?>
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