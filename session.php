<?php 
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');

if (!isset($_SESSION['RETAIL_ID']) || trim($_SESSION['RETAIL_ID']) == '') {
	header('location: login.php');
	exit();
}

$id =  $_SESSION['RETAIL_ID'];
$sql = "SELECT * FROM retailers WHERE id='$id'";
$res =  mysqli_query($con,$sql);
$retailers = mysqli_fetch_assoc($res);
