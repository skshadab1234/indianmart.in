<?php 
include 'session.php';

if (isset($_POST['id'])) {
	$id = get_safe_value($_POST['id']);
	$res = mysqli_query($con,"select * from wholeseller where id = '$id'");
	$row = mysqli_fetch_assoc($res);

	$arr = array('status'=>$row['status']);
	if ($row['status'] == 1) {
		$_SESSION['SELLER_ID'] = $row['id'];
	}
	echo json_encode($arr);
}