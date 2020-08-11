<?php
session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

$con=mysqli_connect('localhost','root','','indiamart');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from wholeseller where seller_email='$email'");
$count=mysqli_num_rows($res);
$row = mysqli_fetch_assoc($res);
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
      $mail->Subject = $subject;
      $mail->Body = $html;

      $mail->send();
      echo  'yes';
  }else{
	$output =  "not_exist";
}
?>