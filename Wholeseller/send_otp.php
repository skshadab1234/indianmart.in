<?php
session_start();
include('../database.inc.php');
include('../function.inc.php');

$email=$_POST['email'];
$res=mysqli_query($con,"select * from wholeseller where seller_email='$email'");
$count=mysqli_num_rows($res);
$row = mysqli_fetch_assoc($res);
if (empty($email)) {
  echo "empty";
}
if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($con,"update wholeseller set otp='$otp' where seller_email='$email'");
	$html="Your otp verification code is ".$otp;
	$subject = "Verification Code";
	$_SESSION['SELLER_EMAIL']=$email;
 

  require '../vendor/phpmailer/phpmailer/src/Exception.php';
  require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '../vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require '../vendor/autoload.php';
 
 send_mail($email,$subject,$html);
      echo  'yes';
  }else{
	$output =  "not_exist";
}
?>