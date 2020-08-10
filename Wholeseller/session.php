<?php 
session_start();
include('../database.inc.php');
include('../function.inc.php');
include('../constant.inc.php');

if (!isset($_SESSION['SELLER_ID']) || trim($_SESSION['SELLER_ID']) == '') {
	header('location: login.php');
	exit();
}

$id =  $_SESSION['SELLER_ID'];
$sql = "SELECT * FROM wholeseller WHERE id='$id'";
$res =  mysqli_query($con,$sql);
$wholeseller = mysqli_fetch_assoc($res);
