<?php 
session_start();
include('../database.inc.php');
include('../function.inc.php');
include('../constant.inc.php');

if (!isset($_SESSION['ADMIN_ID']) || trim($_SESSION['ADMIN_ID']) == '') {
	header('location: ./index.php');
	exit();
}

$id =  $_SESSION['ADMIN_ID'];
$sql = "SELECT * FROM admin WHERE id='$id'";
$res =  mysqli_query($con,$sql);
$admin = mysqli_fetch_assoc($res);
