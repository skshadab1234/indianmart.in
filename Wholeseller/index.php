<?php
include('session.php');

$image = (!empty($wholeseller['seller_img']) ? SITE_SELLER_IMAGE.$wholeseller['seller_img'] : SITE_USER_IMAGE."noimage.jpg");

$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];


$page_title='';
if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
	$page_title='Dashboard';
}          
?>  

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
      <div class="wrapper">
        

        	<?php
        	if (empty($wholeseller['seller_shop_name'])) {
        		if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
						$page_title='Set Shop Name';
					}          
        		?>
        		<!DOCTYPE html>
<html lang="en">
<head>
        		<title><?php echo $page_title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/css/util.css">
	<link rel="stylesheet" type="text/css" href="Form/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container-contact100" style="background-color: #fff">
			<form class="contact100-form validate-form" method="post">
				<span class="contact100-form-title">
					<b style="color: steelblue">Indian</b><small>kart. </small><span style="font-size: 14px">Seller</span>
				</span>
				<div class="wrap-input100" >
					<label class="label-input100" for="name">Business name / Shop Name</label>
					<input class="input100" type="text" id="businessname"  placeholder="Ex.. SHADABZONE">
					<span class="focus-input100"></span>
				</div>
				<span class="businessname_error" style="color: red;font-style: italic;"></span>
				<span class="businessname_success" style="color: green;font-style: italic;"></span>
				<div class="container-contact100-form-btn">
					<button type="button" class="contact100-form-btn" onclick="send_business_name()">
						Next
					</button>
				</div>
			</form>
	</div>

<script type="text/javascript">

 function send_business_name(){
 jQuery('.contact100-form-btn').html("Please Wait..");
 jQuery('.contact100-form-btn').attr('disabled',true);	
  jQuery('.businessname_error').html('').hide();
  jQuery('.businessname_success').html('').hide();
  var businessname=jQuery('#businessname').val();
  jQuery.ajax({
    url:'complete_registration_seller.php',
    type:'post',
    data:{businessname:businessname},
    success:function(result){
 jQuery('.contact100-form-btn').html("Next");
 jQuery('.contact100-form-btn').attr('disabled',false);	
     var data = jQuery.parseJSON(result);
     if (data.status=="error") {
     	jQuery('.'+data.field).html(data.msg);
     	jQuery('.'+data.field).show();
     }
     if (data.status=="success") {
     	jQuery('.'+data.field).html(data.msg);
     	jQuery('.'+data.field).show();
     	window.location="index.php";
     }
    }
  });

}
</script>
<!--===============================================================================================-->
	<script src="Form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/bootstrap/js/popper.js"></script>
	<script src="Form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="Form/vendor/daterangepicker/moment.min.js"></script>
	<script src="Form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Form/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

  <!-- jQuery -->
<script src="../admin/template_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/template_admin/dist/js/adminlte.min.js"></script>
</body>
</html>

        		<?php
        	}elseif (empty($wholeseller['seller_country']) > 0 || empty($wholeseller['seller_state']) > 0 || empty($wholeseller['seller_city']) > 0 || empty($wholeseller['seller_address'])) {

        		if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
						$page_title='Set Address';
					}   
        		?>
        		        		<!DOCTYPE html>
<html lang="en">
<head>
        		<title><?php echo $page_title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/css/util.css">
	<link rel="stylesheet" type="text/css" href="Form/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container-contact100" style="background-color: #fff">
			<form class="contact100-form validate-form" method="post">
				<span class="contact100-form-title">
					<b style="color: steelblue">Indian</b><small>kart. </small><span style="font-size: 14px">Seller</span>
				</span>
				<div class="wrap-input100" id="businessname_name_change_color" style="position: relative;top: 0;left: 0;background-color: #eee">
					<label class="label-input100" for="name">Business name</label>
					<input class="input100" type="text" id="name_bus"  value="<?= $wholeseller['seller_shop_name'] ?>" readonly>
						<span class="focus-input100"></span>
					<div style="position: absolute;top: 25px;right: 28px;">
					<span style="color: green;"><i  id="check" class="fa fa-check-circle"></i>
					<button  type="button" id="enable_readonly_btn" onclick="enable_readonly()" style="color:steelblue">edit</button></span>
					<button  type="button" id="disable_readonly_btn" onclick="disable_readonly()" style="display: none;color:steelblue;">Update</button></span>
					</div>
				<span class="businessname_error" style="color: red;font-style: italic;"></span>
				</div>
				<div class="wrap-input100" >
					<label class="label-input100" for="name">Address Line 1</label>
					<textarea class="input100"  id="address_line1" placeholder="Ex.. Shaheen Bhag, Opp. Bilal Nagar, Near Irani Petrol Pump, Kausa,Mumbra" autofocus=""><?=  $wholeseller['seller_address'] ?></textarea>
						<span class="focus-input100"></span>
				<span class="address_error" style="color: red;font-style: italic;"></span>
				</div>
				
				<div class="wrap-input100">
					<div class="label-input100">Select Country</div>
					<div>
						<select class="js-select2" id="country">
							<option disabled="" selected="">Select Country</option>
							<?php
							$sql = "select * from country order by id asc";
							$res = mysqli_query($con,$sql);

							if (mysqli_num_rows($res) > 0) {
								while ($row = mysqli_fetch_assoc($res)) {
									?>
								<option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
									<?php
								}
							}
							?>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
					
				<span class="country_error" style="color: red;font-style: italic;"></span>
				</div>

				<div class="wrap-input100">
					<div class="label-input100">Select State</div>
					<div>
						<select class="js-select2" id="state">
						<option disabled="" selected="">Select State</option>
							<?php
							$sql = "select * from state order by StateID asc";
							$res = mysqli_query($con,$sql);

							if (mysqli_num_rows($res) > 0) {
								while ($row = mysqli_fetch_assoc($res)) {
									?>
								<option value="<?= $row['StateID'] ?>"><?= $row['StateName'] ?></option>
									<?php
								}
							}
							?>	
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
				<span class="state_error" style="color: red;font-style: italic;"></span>

				</div>

				<div class="wrap-input100">
					<div class="label-input100">Select City</div>
					<div>
						<select class="js-select2" id="city">
						<option disabled="" selected="">Select City</option>
							<?php
							$sql = "select * from cities order by city_id asc";
							$res = mysqli_query($con,$sql);

							if (mysqli_num_rows($res) > 0) {
								while ($row = mysqli_fetch_assoc($res)) {
									?>
								<option value="<?= $row['city_id'] ?>"><?= $row['city_name'] ?></option>
									<?php
								}
							}
							?>	
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
				<span class="city_error" style="color: red;font-style: italic;"></span>
				</div>
				<span class="businessname_success" style="color: green;font-style: italic;"></span>
				<div class="container-contact100-form-btn">
					<button type="button" class="contact100-form-btn" onclick="send_address()">
						Next
					</button>
				</div>
			</form>
	</div>
<script type="text/javascript">
	function enable_readonly(){
		jQuery('#name_bus').attr('readonly',false);
		jQuery('#name_bus').focus();
		jQuery('#businessname_name_change_color').css("background","white");
		jQuery('#check').hide();
		jQuery('#enable_readonly_btn').hide();
		jQuery('#disable_readonly_btn').show();
	}

	function disable_readonly(argument) {
		jQuery('#name_bus').attr('readonly',true);
		jQuery('#businessname_name_change_color').css("background","#eee");
		jQuery('#disable_readonly_btn').hide();
		jQuery('#enable_readonly_btn').show();
		jQuery('#check').show();
	}

 function send_address(){
 jQuery('.contact100-form-btn').html("Please Wait..");
 jQuery('.contact100-form-btn').attr('disabled',true);	
  jQuery('.businessname_error').html('').hide();
  jQuery('.businessname_success').html('').hide();
  jQuery('.country_error').html('').hide();
  jQuery('.state_error').html('').hide();
  jQuery('.city_error').html('').hide();
  jQuery('.address_error').html('').hide();
  var business_name=jQuery('#name_bus').val();
  var country=jQuery('#country').val();
  var state=jQuery('#state').val();
  var city=jQuery('#city').val();
  var address_line1=jQuery('#address_line1').val();
  jQuery.ajax({
    url:'complete_registration_seller.php',
    type:'post',
    data:{business_name:business_name,country:country,state:state,city:city,address_line1:address_line1},
    success:function(result){
    	 jQuery('.contact100-form-btn').html("Next");
 		 jQuery('.contact100-form-btn').attr('disabled',false);
     var data = jQuery.parseJSON(result);
     if (data.status=="error") {
     	jQuery('.'+data.field).html(data.msg);
     	jQuery('.'+data.field).show();
     }
     if (data.status=="success") {
     	jQuery('.'+data.field).html(data.msg);
     	jQuery('.'+data.field).show();
     	window.location="index.php";
     }
    }
  });

}
</script>
<!--===============================================================================================-->
	<script src="Form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/bootstrap/js/popper.js"></script>
	<script src="Form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="Form/vendor/daterangepicker/moment.min.js"></script>
	<script src="Form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Form/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

  <!-- jQuery -->
<script src="../admin/template_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/template_admin/dist/js/adminlte.min.js"></script>
</body>
</html>

			<?php
        	}elseif (empty($wholeseller['category'])>0) {

        		if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
						$page_title='Choose Category';
					}   
        		?>
        		        		<!DOCTYPE html>
<html lang="en">
<head>
        		<title><?php echo $page_title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/css/util.css">
	<link rel="stylesheet" type="text/css" href="Form/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container-contact100" style="background-color: #fff">
			<form class="contact100-form validate-form" method="post">
				<span class="contact100-form-title">
					<h4>Select Category</h4>
				</span>
				<div class="wrap-input100">
					<div class="label-input100">choose category</div>
					<div>
						<select class="js-select2" id="category">
						<option disabled="" selected="">Select category</option>
							<?php
							$sql = "select * from category order by id asc";
							$res = mysqli_query($con,$sql);

							if (mysqli_num_rows($res) > 0) {
								while ($row = mysqli_fetch_assoc($res)) {
									?>
								<option value="<?= $row['id'] ?>"><?= $row['catgeory_name'] ?></option>
									<?php
								}
							}
							?>	
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="focus-input100"></span>
				</div>
				<span class="category_error" style="color: red;font-style: italic;"></span>
				<span class="businessname_success" style="color: green;font-style: italic;"></span>
				<div class="container-contact100-form-btn">
					<button type="button" class="contact100-form-btn" onclick="send_category()">
						Next
					</button>
				</div>
			</form>
	</div>
<script type="text/javascript">
	
 function send_category(){
 jQuery('.contact100-form-btn').html("Please Wait..");
 jQuery('.contact100-form-btn').attr('disabled',true);	
  jQuery('.category_error').html('').hide();
  var category=jQuery('#category').val();
  jQuery.ajax({
    url:'complete_registration_seller.php',
    type:'post',
    data:{category:category},
    success:function(result){
    	 jQuery('.contact100-form-btn').html("Next");
 		 jQuery('.contact100-form-btn').attr('disabled',false);
     var data = jQuery.parseJSON(result);
     if (data.status=="error") {
     	jQuery('.'+data.field).html(data.msg);
     	jQuery('.'+data.field).show();
     }
     if (data.status=="success") {
     	jQuery('.'+data.field).html(data.msg);
     	jQuery('.'+data.field).show();
     	window.location="index.php";
     }
    }
  });

}
</script>
<!--===============================================================================================-->
	<script src="Form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/bootstrap/js/popper.js"></script>
	<script src="Form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="Form/vendor/daterangepicker/moment.min.js"></script>
	<script src="Form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Form/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

  <!-- jQuery -->
<script src="../admin/template_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/template_admin/dist/js/adminlte.min.js"></script>
</body>
</html>

			<?php
        	}elseif (empty($wholeseller['gst_img'])) {

        		if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
						$page_title='Upload GST';
					}   
					
					if (isset($_POST['upload_gst'])) {
						$id = $wholeseller['id'];
						$gst_img = $_FILES['gst_img']['name'];
					     if (!empty($gst_img)) {
					     $profile = time().'_'.$gst_img;
					     $target = "../media/gst_img/".$profile;
					     move_uploaded_file($_FILES['gst_img']['tmp_name'], $target);
					     $gst_img = $profile;
					     	
				     	$sql = "update wholeseller set gst_img='$gst_img' where id = '$id'";
				     	mysqli_query($con,$sql);
				     	redirect('index.php');
					     }else{
					      $gst_img = $wholeseller['gst_img'];
					     }
					}
        		?>
        		        		<!DOCTYPE html>
<html lang="en">
<head>
        		<title><?php echo $page_title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Form/css/util.css">
	<link rel="stylesheet" type="text/css" href="Form/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container-contact100" style="background-color: #fff">
			<form class="contact100-form validate-form" method="post" action="" enctype="multipart/form-data">
				<span class="contact100-form-title">
					<h4>Upload Your Correct GST</h4>
				</span>
				<div >
					<input class="input100" type="file" name="gst_img" >
				</div>
				<span class="gst_error" style="color: red;font-style: italic;"></span>
				<span class="businessname_success" style="color: green;font-style: italic;"></span>
				<div class="container-contact100-form-btn">
					<button type="submit" name="upload_gst" class="contact100-form-btn" >
						Next
					</button>
				</div>
			</form>
	</div>

<!--===============================================================================================-->
	<script src="Form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/bootstrap/js/popper.js"></script>
	<script src="Form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
		$(".js-select2").each(function(){
			$(this).on('select2:open', function (e){
				$(this).parent().next().addClass('eff-focus-selection');
			});
		});
		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				$(this).parent().next().removeClass('eff-focus-selection');
			});
		});

	</script>
<!--===============================================================================================-->
	<script src="Form/vendor/daterangepicker/moment.min.js"></script>
	<script src="Form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Form/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

  <!-- jQuery -->
<script src="../admin/template_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/template_admin/dist/js/adminlte.min.js"></script>
</body>
</html>

			<?php
        	}elseif (empty($wholeseller['admin_approv']) > 0) {
					if ($wholeseller['status'] == 1) {
						if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
						$page_title='Verified';
					}
        		?>
        		<html>
  <head>
        		<title><?php echo $page_title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
          <?php
      	$text = "Account has been Created ";
      	$color = "";
      	$subtext = FRONT_SITE_NAME." Admin will verify your documents within 24hr your account will be activated if your documents are correct.";
      	$logo = "✓";
      	$appologi_msg = "";
      if ($wholeseller['admin_blocked'] == 1) {
      	$color = "red";
      	$text = "Your Account has been blocked";
      	$subtext ="<strong>Message From Admin :-</strong>".$wholeseller['blocking_msg'];
      	$logo = "✕";
      	$logo_color = "red";
      	$appologi_msg = "Contact to admin:- <a href='contact_us.php'>Click here</a>";
      }	
      ?>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i style="color:<?= $logo_color ?>;font-style: normal;margin: 2px"><?= $logo ?></i>
      </div>
  
        <h1 style="color: <?= $color ?>"><?= $text ?></h1> 
        
        <p><?php echo $subtext ?></p>
        <p><?= $appologi_msg ?></p>
      </div>
     
    </body>
</html>
        		<?php
			}else{
				if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
						$page_title='Not Verified';
					}
				?>
				<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?= $page_title ?></title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo FRONT_SITE_PATH ?>error/css/style.css" />
	<script type="text/javascript" src="<?php echo FRONT_SITE_PATH ?>countdowntimer/LIB/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="<?php echo FRONT_SITE_PATH ?>countdowntimer/jquery.countdownTimer.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo FRONT_SITE_PATH ?>countdowntimer/CSS/jquery.countdownTimer.css" />
</head>
<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
			</div>
			<h2 style="color: red">account is not activated</h2>
			<p>Click on the button given below and verify your account.</p>
			<p>In case a verification email is not sended.Then the button will enable after 30 second.</p>
			<BUTTON href="javascript:void(0)" id="verification_send" onclick="send_veification_code()">Send Verification Email</BUTTON>
			<div class="container-fluid" style="padding: 25px;">
				<p class="message_send" style="color: green;font-size: 17px;font-weight: 600;"></p>
				<span id="hm_timer"></span>
			</div>
		</div>
	</div>
			
	<script type="text/javascript">
			function timer(){
					$(function(){
			jQuery('#hm_timer').html('').hide();
				$('#hm_timer').countdowntimer({
				seconds :30,
				size : "xs"
				});
				});
			}
		function send_veification_code() {
			jQuery('#verification_send').html("Please Wait....");
			jQuery('#verification_send').attr('disabled',true);
			jQuery('.message_send').html('').hide();
		jQuery.ajax({
				url: "complete_registration_seller.php",
			 	  success:function(result){
			jQuery('#verification_send').html("Sended");
			jQuery('#verification_send').css('background','green');
			setInterval(function(){
			 jQuery('#verification_send').html("Send Confirmation Email");
			jQuery('#verification_send').css('background','#0046d5');
			jQuery('#verification_send').attr('disabled',false);
			jQuery('.message_send').html('').hide();
			jQuery('#hm_timer').html('').hide();
				}, 30000);

				var data = jQuery.parseJSON(result);
				if (data.status == "login") {
					window.location = "index.php";
				}	
					
				if (data.status=="success") {
				jQuery('.'+data.field).html(data.msg);
				jQuery('.'+data.field).show();
				setInterval(function(){
					Check_seller_status(data.id);
				}, 2000);
				timer();
				jQuery('#hm_timer').show();
				
				}

				
				}	
			});
	}

	function Check_seller_status(id) {
		jQuery.ajax({
			url:"Check_seller_status.php",
			data:"id="+id,
			type:"post",
			success:function(result) {
				var data = jQuery.parseJSON(result);
				if (data.status == '1') {
					window.location.href='index.php';
				}
			}
		});
	}
	</script>
</body>
</html>
			<?php
			}	

        	}
        	else{
        		?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $page_title?></title>
<!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/template_admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <!-- DataTables -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../admin/template_admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../admin/template_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../admin/template_admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  
</head>


          <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
            
             <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>


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
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="myaccount.php" class="brand-link">

      <img src="<?= $image ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $wholeseller['seller_name'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user mt-3 pb-3 mb-3 d-flex">
        
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false" >
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
                if($page_title == "Products"){
                  $link = "javascript:void(0)";
                  $active1 = "active";
                }else{
                  $link = "wholeseller_products.php";
                  $active1 = "";
                }
                ?>
            <a href="<?= $link ?>" class="nav-link <?= $active1 ?>">
              <i class="nav-icon fas fa-object-group"></i>
              <p>
                Products
              </p>
            </a>
           
          </li>
                 <li class="nav-item">
            <?php
                $active2 = ""; 
                if($page_title == "Coupon Code"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "coupon_code.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Coupon Code
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
         
             <li class="nav-item">
            <?php
                $active2 = ""; 
                if($page_title == "Contact us"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "contact_us.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contact us
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

           <li class="nav-item">
            <?php
                $active2 = ""; 
                if($page_title == "Enquiry"){
                  $link2 = "javascript:void(0)";
                  $active2 = "active";
                }else{
                  $link2 = "enquiries.php";
                  
                }
                ?>
            <a href="<?= $link2 ?>" class="nav-link <?= $active2 ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
              	Enquiry
	                <!-- <span class="right badge badge-danger">New</span> -->
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
         <?php include 'footer.php'; ?>
        		<?php
        	}
        ?>
        
      </div>
      <!-- ./wrapper -->
   </body>

