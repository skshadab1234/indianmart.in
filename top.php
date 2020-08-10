<?php
include('session.php');


$image = (!empty($retailers['retailer_img']) ? SITE_RETAIL_IMAGE.$retailers['retailer_img'] : SITE_USER_IMAGE."noimage.jpg");

$curStr=$_SERVER['REQUEST_URI'];
$curArr=explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];


$page_title='';
if($cur_path=='index.php' || $cur_path=='index.php' || $cur_path==''){
	$page_title='Dashboard';
}          
?>
