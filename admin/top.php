<?php
include('session.php');


if(!isset($_SESSION['ADMIN_ID'])){
  redirect('login.php');
}

$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];


$page_title='';
if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
	$page_title='Dashboard';
}elseif($cur_path=='retailers.php' || $cur_path=='manage_retailers.php'){
	$page_title='Retailers';
}elseif($cur_path=='myaccount.php' || $cur_path=='myaccount.php'){
  $page_title='Account';
}elseif($cur_path=='wholeseller.php' || $cur_path=='manage_wholeseller.php'){
  $page_title='Wholeseller';
}elseif($cur_path=='category.php' || $cur_path=='manage_category.php'){
  $page_title='Category';
}elseif($cur_path=='subcategory.php' || $cur_path=='manage_subcategory.php'){
  $page_title='Subcategory';
}elseif($cur_path=='products.php' || $cur_path=='manage_products.php'){
  $page_title='Products';
}elseif($cur_path=='enquiry.php'){
  $page_title='Enquiries';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
<!-- Font Awesome Icons -->
  <link rel="stylesheet" href="template_admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="template_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template_admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <!-- DataTables -->
  <link rel="stylesheet" href="template_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="template_admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="template_admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="template_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="template_admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  
</head>


          <body>
            
             <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="template_admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="template_admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="template_admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="myaccount.php" class="brand-link">
      <img src="<?= SITE_USER_IMAGE.$admin['photo'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $admin['name'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user mt-3 pb-3 mb-3 d-flex">
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <?php 
                if($page_title == "Dashboard"){
                  $link = "javascript:void(0)";
                  $active1 = "active";
                }else{
                  $link = "index.php";
                }
                ?>
            <a href="<?= $link ?>" class="nav-link <?= $active1 ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
         <li class="nav-header">Manage</li>

          <li class="nav-item">
             <?php
                $active2 = ""; 
                if($page_title == "Retailers"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "retailers.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Retailers
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
             <?php
                $active2 = ""; 
                if($page_title == "Wholeseller"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "wholeseller.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Wholesellers
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        <li class="nav-item">
            <?php
                $active2 = ""; 
                if($page_title == "Category"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "category.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
           <li class="nav-item">
            <?php
                $active2 = ""; 
                if($page_title == "Subcategory"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "subcategory.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Subcategory
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

           <li class="nav-item">
            <?php
                $active2 = ""; 
                if($page_title == "Products"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "products.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Products
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php
                $active2 = ""; 
                if($page_title == "Enquiries"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "enquiry.php";
                  
                }
                ?>
          <li class="nav-item">
               
            <a href="<?= $link2 ?>" class="nav-link <?=  $active2 ?>">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Enquiries
              </p>
            </a>
           
          </li>

          <?php
                $active2 = ""; 
                if($page_title == "Setting"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "setting.php";
                  
                }
                ?>
          <li class="nav-item">
               
            <a href="<?= $link2 ?>" class="nav-link <?=  $active2 ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
              </p>
            </a>
           
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
          </body>