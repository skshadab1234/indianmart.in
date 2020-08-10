<?php
session_start();
include('database.inc.php');
include('function.inc.php');

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
			$sql = "Select * from retailers where retailer_email = '$email'";
			$res = mysqli_query($con,$sql);
			$count = mysqli_num_rows($res);
			if($count > 0){
				$arr=array('status'=>'error','msg'=>'Email id already exists','field'=>'error_field');
			}else{		
				$password = password_hash($password, PASSWORD_DEFAULT);
				$added_on = date("Y-m-d h:i:s");
				$rand_str = rand(11111,99999);
				
				$sql = "INSERT into retailer_email (owner_name,retailer_email,retailer_password,rand_str,status,added_on) Values('$name', '$email', '$password','$rand_str','0','$added_on')";
				$result = mysqli_query($con,$sql);
					$html = "Verify Your Retailer Account Email </br><a href='verify.php?rand_str=".$rand_str."'>Click here to verify</a>";
		      		require_once("smtp/class.phpmailer.php");
					smtp_mailer($email,"Verify Your Email",$html);
					$arr=array('status'=>'success','msg'=>'Verify your Email id','field'=>'success_field');
					
				}
				}
		}else{
			$arr=array('status'=>'error','msg'=>'Fill the form','field'=>'error_field');

		}
			echo json_encode($arr);

		}