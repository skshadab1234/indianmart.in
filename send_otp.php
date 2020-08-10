<?php
session_start();
$con=mysqli_connect('localhost','root','','indiamart');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from retailers where retailer_email='$email'");
$count=mysqli_num_rows($res);
$row = mysqli_fetch_assoc($res);
if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($con,"update retailers set otp='$otp' where retailer_email='$email'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['RETAIL_EMAIL']=$email;
	$_SESSION['RETAIL_ID']=$row['id'];
	smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}else{
	echo "not_exist";
}

function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'TLS'; 
	$mail->Host = "smtp.sendgrid.net";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "ks615044@gmail.com";
	$mail->Password = "skshadab1234";
	$mail->SetFrom("ks615044@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>