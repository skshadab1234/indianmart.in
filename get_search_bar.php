<?php
include 'session.php';

if (isset($_POST['search'])) {
	$search = get_safe_value($_POST['search']);
	$sql = "SELECT * FROM products where product_name LIKE '%$search%'";
	$res= mysqli_query($con,$sql);
	$output = "<div class='container'>";
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_array($res)) {
		$output .= "<li class='list-item' id='list_item'>".createSlug($row['product_name_slug'])." </li>";		
		}

	}else{
		$output.= '<p class="list-item">Data Not Found</p>';
	}
	$output .= "</div>";
	echo $output;
}