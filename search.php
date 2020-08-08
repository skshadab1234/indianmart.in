<?php include 'includes/header.php'; ?>
<?php
	$search_result = get_safe_value($_GET['keyword']);
	$sql = "SELECT * FROM products LEFT JOIN wholeseller ON products.added_by = wholeseller.id LEFT JOIN country ON wholeseller.seller_country = country.id LEFT JOIN state ON state.StateID = wholeseller.seller_state LEFT JOIN cities ON cities.city_id = wholeseller.seller_city  where product_name_slug LIKE '%$search_result%' and products.status = 1";
	$res= mysqli_query($con,$sql);
	$count_var = mysqli_num_rows($res);
	if (mysqli_num_rows($res) == 1) {
	$count = "product";
	}else{
	$count = "products";
	}

$category = "SELECT * FROM `subcategory` LEFT JOIN category ON subcategory.cat_id_of_subcat = category.id WHERE subcategory.cat_id_of_subcat = category.id limit 6";
$cat_res =  mysqli_query($con,$category);

?>


<!DOCTYPE html>
<html>
<head>
	<title><?= $search_result?></title>
	<!-- 
	<section class="content">
		<div class="container">
		<h5><?= $search_result ?> <small>(<?= $count_var.' '.$count ?> available)</small></h5>
	</div>
	</section>
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				<div class="card">
				  <div class="card-header">Related Category</div>
				  <div class="card-body">
				  	<ul>
				  		<?php
				  		if (mysqli_num_rows($cat_res) > 0) {
				  			while ($row=  mysqli_fetch_assoc($cat_res)) {
				  				
				  			?>
				  			<li><a href="?subct=1"><?= $row['subcategory_name'] ?></a></li>
				  			<?php
				  		}
				  		}
				  		?>
				  	</ul>
				  </div>
				</div>
				</div>
				<div class="col-sm-9">
					<?php
					if (mysqli_num_rows($res) > 0) {
						while ($row = mysqli_fetch_assoc($res)) {
							?>
								<div class="container-fluid" style="background: #fff;padding: 10px">
						<div class="row">
							<div class="col-lg-3">
								<div style="background-image: url(<?= SITE_PRODUCTS_IMAGE.$row['prod_img']?>);width: 200px;height: 200px;background-size: cover;background-repeat: no-repeat;border:1px solid #eee"></div>
							</div>
							<div class="col-lg-5">
								<a href=""><h5 class="eclipse_text"><?= $row['product_name'] ?></h5></a>
								<h6 class="eclipse_text" style="color: #000"><?= '₹ '.number_format($row['price'],1).' / <span style="font-weight:lighter">'.$row['price_unit'] ?></span></h6>	
								<div class="container-fluid">
									<?= $row['description']  ?>
								</div>
							</div>
						<div class="col-lg-4" style="background: rgba(233,234,234,0.5);padding: 5px">
							<h5 class="eclipse_text" style="color: #010101;font-weight: lighter;"><?= $row['seller_shop_name'] ?></h5>
							<P style="font-size: 12px"><?= $row['seller_address'].','.$row['StateName'].','.$row['city_name'] ?></P>

							<a class="eclipse_text" style="font-size: 12px;margin-left: 10px" href="mailto: <?= $row['seller_email'] ?>"><h5 style="font-size: 14px"><i class="fa fa-envelope"></i>&nbsp;&nbsp;<?= $row['seller_email'] ?></h5></a>

							<button  style="display: block;margin: 4px auto;border: 1px solid #068076;text-align: center;color: #068076;font-size: 16px;line-height: 35px;border-radius: 5px;font-weight: 400;cursor: pointer;position: absolute;bottom: 10px;width: 220px;box-sizing: border-box;left: 0;right: 0;font-weight: bold;outline: 0;height: 50px;outline: 0;" data-toggle="modal" data-target="#SUPPLIER_MODAL">Contact Supplier</button>
							<div class="modal fade" id="SUPPLIER_MODAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['seller_shop_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                        <div class="container-fluid" style="padding: 0;margin: 0">
                                        	 <div class="row">
                                         	<div class="col-sm-4">asa</div>	
                                         	<div class="col-sm-8" >asa</div>	
                                         </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
							</div>

						</div>
					</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	
	</section> -->
<head>
  <style>
    .container-fluid {
      margin-bottom: 10px;
      background: #fff;
    }

    #brandimage:hover {
      transform: scale(1.01);
      overflow: hidden;
      transition: transform, 0.5s ease all;
    }
  </style>
</head>

<body class="layout-top-nav">
  <?php include 'includes/navbar.php'; ?>

  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="container">
			<div class="row">
				<div class="col-sm-3">
				<div class="card">
				  <div class="card-header">Related Category</div>
				  <div class="card-body">
				  	<ul>
				  		<?php
				  		if (mysqli_num_rows($cat_res) > 0) {
				  			while ($row=  mysqli_fetch_assoc($cat_res)) {
				  				
				  			?>
				  			<li><a href="?subct=1"><?= $row['subcategory_name'] ?></a></li>
				  			<?php
				  		}
				  		}
				  		?>
				  	</ul>
				  </div>
				</div>
				</div>
				<div class="col-sm-9">
					<?php
					if (mysqli_num_rows($res) > 0) {
						while ($row = mysqli_fetch_assoc($res)) {
							?>
								<div class="container-fluid" style="background: #fff;padding: 10px">
						<div class="row">
							<div class="col-lg-3">
								<div style="background-image: url(<?= SITE_PRODUCTS_IMAGE.$row['prod_img']?>);width: 200px;height: 200px;background-size: cover;background-repeat: no-repeat;border:1px solid #eee"></div>
							</div>
							<div class="col-lg-5">
								<a href=""><h5 class="eclipse_text"><?= $row['product_name'] ?></h5></a>
								<h6 class="eclipse_text" style="color: #000"><?= '₹ '.number_format($row['price'],1).' / <span style="font-weight:lighter">'.$row['price_unit'] ?></span></h6>	
								<div class="container-fluid">
									<?= $row['description']  ?>
								</div>
							</div>
						<div class="col-lg-4" style="background: rgba(233,234,234,0.5);padding: 5px">
							<h5 class="eclipse_text" style="color: #010101;font-weight: lighter;"><?= $row['seller_shop_name'] ?></h5>
							<P style="font-size: 12px"><?= $row['seller_address'].','.$row['StateName'].','.$row['city_name'] ?></P>

							<a class="eclipse_text" style="font-size: 12px;margin-left: 10px" href="mailto: <?= $row['seller_email'] ?>"><h5 style="font-size: 14px"><i class="fa fa-envelope"></i>&nbsp;&nbsp;<?= $row['seller_email'] ?></h5></a>

							<button  style="display: block;margin: 4px auto;border: 1px solid #068076;text-align: center;color: #068076;font-size: 16px;line-height: 35px;border-radius: 5px;font-weight: 400;cursor: pointer;position: absolute;bottom: 10px;width: 220px;box-sizing: border-box;left: 0;right: 0;font-weight: bold;outline: 0;height: 50px;outline: 0;" data-toggle="modal" data-target="#SUPPLIER_MODAL">Contact Supplier</button>
							<div class="modal fade" id="SUPPLIER_MODAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="width: 100vw">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><?= $row['seller_shop_name'] ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body" style="align-items: center;display: flex;justify-content: center;">
                                        <div class="container-fluid" style="padding: 0;margin: 0">
                                        	 <div class="row">
                                         	<div class="col-sm-4">asa</div>	
                                         	<div class="col-sm-8" >asa</div>	
                                         </div>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
							</div>

						</div>
					</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	
</section>

</div>  
  <div><?php include 'includes/footer.php'; ?></div>
</div>
   
  <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/essence_script.php'; ?>

         <!--  <script>
            setTimeout(function() {

              $('#myModal').modal('show');
            }, 0000);


            setTimeout(function() {
              $('#myModal').modal('hide');
            }, 5000);

            $('#myModal').delay(4000).fadeOut(6000);
          </script> --> -->
</body>

</html>