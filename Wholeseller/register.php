<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

include('../database.inc.php');
include('../function.inc.php');

 function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword'])) {
	$name = get_safe_value($_POST['name']);
	$email = get_safe_value($_POST['email']);
	$password = get_safe_value($_POST['password']);
	$repassword = get_safe_value($_POST['repassword']);

	if ($password !== $repassword) {
		$arr=array('status'=>'error','msg'=>'Password did not Match ','field'=>'error_field');
	}elseif(!empty($name) && !empty($email) && !empty($password)){
		
		if(!checkemail($email)){
		$arr=array('status'=>'error','msg'=>'Enter Correct Email address','field'=>'email_field');
		}else{
			$sql = "Select * from wholeseller where seller_email = '$email'";
			$res = mysqli_query($con,$sql);
			$count = mysqli_num_rows($res);
			if($count > 0){
				$arr=array('status'=>'error','msg'=>'Email id already exists','field'=>'error_field');
			}else{		
				$password = password_hash($password, PASSWORD_DEFAULT);
				$added_on = date("Y-m-d h:i:s");
				$rand_str = rand(11111,99999);
				
				$sql = "INSERT into wholeseller (seller_name,seller_email,seller_password,rand_str,status,added_on) Values('$name', '$email', '$password','$rand_str','0','$added_on')";
				$did = mysqli_insert_id($con);
				$result = mysqli_query($con,$sql);
					$html = "Verify Your Email </br><a href='verify.php?rand_str=".$rand_str."'>Click here to verify</a>";
		      		
			  // Include autoload.php file
			  require '../vendor/autoload.php';
			  // Create object of PHPMailer class
			 	 $mail = new PHPMailer(true);

			      $mail->isSMTP();
			      $mail->Host = 'smtp.gmail.com';
			      $mail->SMTPAuth = true;
			      // Gmail ID which you want to use as SMTP server
			      $mail->Username = 'ks615044@gmail.com';
			      // Gmail Password
			      $mail->Password = '*';
			      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			      $mail->Port = 587;

			      // Email ID from which you want to send the email
			      $mail->setFrom('ks615044@gmail.com');
			      // Recipient Email ID where you want to receive emails
			      $mail->addAddress($email);

			      $mail->isHTML(true);
			      $mail->Subject = "Verify Your Email";
			      $mail->Body = $html;

			      $mail->send();
				
					$arr=array('status'=>'success','msg'=>'Verify your Email id','field'=>'success_field');
					
				}
				}
		}else{
			$arr=array('status'=>'error','msg'=>'Fill the form','field'=>'error_field');

		}
			echo json_encode($arr);

		}
