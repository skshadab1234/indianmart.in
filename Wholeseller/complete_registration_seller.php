<?php
include('session.php');
			$id = $wholeseller['id'];

if (isset($_POST['businessname'])) {
	$businessname =  get_safe_value($_POST['businessname']);
	$sql = "SELECT * FROM wholeseller Where seller_shop_name='$businessname'";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
	
	if (strlen($businessname) <= 6) {
		$arr = array("status"=> "error", "msg"=> "Business Name is too short", "field"=>"businessname_error");
		echo json_encode($arr);
	}
	elseif (empty($businessname)) {
		$arr = array("status"=> "error", "msg"=> "This field is required", "field"=>"businessname_error");
		echo json_encode($arr);
	}
	elseif (strlen($businessname) > 50) {
		$arr = array("status"=> "error", "msg"=> "Business Name is too long", "field"=>"businessname_error");
		echo json_encode($arr);
	}elseif ($count > 0 ) {
		$arr = array("status"=> "error", "msg"=> "Business Name already taken", "field"=>"businessname_error");
		echo json_encode($arr);
	}else{
			$sql = "update wholeseller set seller_shop_name='$businessname' where id = '$id'";
			mysqli_query($con,$sql);

			$arr = array("status"=> "success", "msg"=> "We are redirecting you to next page....", "field"=>"businessname_success");
			echo json_encode($arr);

	}

}elseif(isset($_POST['business_name']) && isset($_POST['country']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['address_line1'])){
	$business_name = get_safe_value($_POST['business_name']);
	$country = get_safe_value($_POST['country']);
	$state = get_safe_value($_POST['state']);
	$city = get_safe_value($_POST['city']);
	$address_line1 = get_safe_value($_POST['address_line1']);



	if (empty($business_name)) {
		$arr = array("status"=> "error", "msg"=> "You cannot leave name as blank", "field"=>"businessname_error");
		echo json_encode($arr);
	}
	elseif (empty($address_line1)) {
		$arr = array("status"=> "error", "msg"=> "Address is required", "field"=>"address_error");
		echo json_encode($arr);
	}elseif (strlen($address_line1) <= 40) {
		$arr = array("status"=> "error", "msg"=> "Add Correct address with Landmark", "field"=>"address_error");
		echo json_encode($arr);
	}elseif (empty($country)) {
		$arr = array("status"=> "error", "msg"=> "Country is required", "field"=>"country_error");
		echo json_encode($arr);
	}
	elseif (empty($state)) {
		$arr = array("status"=> "error", "msg"=> "State is required", "field"=>"state_error");
		echo json_encode($arr);
	}elseif (empty($city)) {
		$arr = array("status"=> "error", "msg"=> "city is required", "field"=>"city_error");
		echo json_encode($arr);
	}else{

		$sql = "update wholeseller set seller_shop_name='$business_name',seller_state='$state',seller_country='$country',seller_city='$city',seller_address='$address_line1' where id ='$id'";
		mysqli_query($con,$sql);

		$arr = array("status"=> "success", "msg"=> "We are redirecting you to next page....", "field"=>"businessname_success");
			echo json_encode($arr);
	}
}elseif (isset($_POST['category'])) {
	$category = get_safe_value($_POST['category']);

	if (empty($category)) {
		$arr = array("status"=> "error", "msg"=> "Category is required", "field"=>"category_error");
		echo json_encode($arr);
	}else{
		$sql = "update wholeseller set category='$category' where id = '$id'";
		mysqli_query($con,$sql);

		$arr = array("status"=> "success", "msg"=> "We are redirecting you to next page....", "field"=>"businessname_success");
		echo json_encode($arr);
	}
}elseif ($wholeseller['status'] == 1) {
		$arr = array("status"=> "login");
		echo json_encode($arr);
		exit();
	}else{
	$rand_str = $wholeseller['rand_str'];
	$email =$wholeseller['seller_email'];
	$send_email = FRONT_SITE_PATH."Wholeseller/verify.php?rand_str=".$rand_str."";

	$html = '
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta property="og:title" content="Verify Your Email">
  <title>Verify Your Email</title>
  <style type="text/css">
    #outlook a{
        padding:0;
      }
      body{
        width:100% !important;
      }
      .ReadMsgBody{
        width:100%;
      }
      .ExternalClass{
        width:100%;
      }
      body{
        -webkit-text-size-adjust:none;
      }
      body{
        margin:0;
        padding:0;
      }
      img{
        border:0;
        height:auto;
        line-height:100%;
        outline:none;
        text-decoration:none;
      }
      table td{
        border-collapse:collapse;
      }
      #backgroundTable{
        height:100% !important;
        margin:0;
        padding:0;
        width:100% !important;
      }
    
      body,#backgroundTable{
      background-color:#FAFAFA;
      }
  
      #templateContainer{
       border:1px none #DDDDDD;
      }
 
      h1,.h1{
        color:#202020;
        display:block;
      font-family:Arial;
        font-size:24px;
        font-weight:bold;
        line-height:100%;
        margin-top:20px;
        margin-right:0;
        margin-bottom:20px;
        margin-left:0;
      text-align:center;
      }
  
      h2,.h2{
        color:#202020;
        display:block;
        font-family:Arial;
        font-size:30px;
        font-weight:bold;
        line-height:100%;
        margin-top:0;
        margin-right:0;
        margin-bottom:10px;
        margin-left:0;
        text-align:center;
      }
   
      h3,.h3{
        color:#202020;
        display:block;
        font-family:Arial;
        font-size:26px;
        font-weight:bold;
        line-height:100%;
        margin-top:0;
        margin-right:0;
        margin-bottom:10px;
        margin-left:0;
        text-align:center;
      }
    
      h4,.h4{
        color:#202020;
        display:block;
       font-family:Arial;
       font-size:22px;
       font-weight:bold;
       line-height:100%;
        margin-top:0;
        margin-right:0;
        margin-bottom:10px;
        margin-left:0;
       text-align:center;
      }
  
      #templatePreheader{
        background-color:#FAFAFA;
      }
   
      .preheaderContent div{
        color:#505050;
        font-family:Arial;
        font-size:10px;
        line-height:100%;
        text-align:left;
      }
   
      .preheaderContent div a:link,.preheaderContent div a:visited,.preheaderContent div a .yshortcuts {
       color:#336699;
        font-weight:normal;
       text-decoration:underline;
      }
      .preheaderContent img{
        display:inline;
        height:auto;
        margin-bottom:10px;
        max-width:280px;
      }
    
      #templateHeader{
        background-color:#FFFFFF;
      border-bottom:0;
      }
   
      .headerContent{
        color:#202020;
       font-family:Arial;
        font-size:34px;
       font-weight:bold;
        line-height:100%;
        padding:0;
        text-align:left;
        vertical-align:middle;
        background-color: #FAFAFA;
          padding-bottom: 14px;
      }
   
      .headerContent a:link,.headerContent a:visited,.headerContent a .yshortcuts {
        color:#336699;
       font-weight:normal;
       text-decoration:underline;
      }
      #headerImage{
        height:auto;
        max-width:400px !important;
      }
    
      #templateContainer,.bodyContent{
        background-color:#FFFFFF;
      }
   
      .bodyContent div{
        color:#505050;
        font-family:Arial;
       font-size:14px;
        line-height:150%;
        text-align:left;
      }
   
      .bodyContent div a:link,.bodyContent div a:visited,.bodyContent div a .yshortcuts {
        color:#336699;
        font-weight:normal;
        text-decoration:underline;
      }
      .bodyContent img{
        display:inline;
        height:auto;
        margin-bottom:10px;
        max-width:280px;
      }
 
      #templateFooter{
       background-color:#FFFFFF;
        border-top:0;
      }
  
      .footerContent {
        background-color: #fafafa;
      }
      .footerContent div{
       color:#707070;
        font-family:Arial;
       font-size:11px;
        line-height:150%;
      text-align:left;
      }
      .footerContent div a:link,.footerContent div a:visited,.footerContent div a .yshortcuts {
       color:#336699;
       font-weight:normal;
       text-decoration:underline;
      }
      .footerContent img{
        display:inline;
      }
   
      #social{
       background-color:#FAFAFA;
        border:0;
      }
  
      #social div{
        text-align:left;
      }
   
      #utility{
        background-color:#FFFFFF;
        border:0;
      }
    
      #utility div{
        text-align:left;
      }
      #monkeyRewards img{
        display:inline;
        height:auto;
        max-width:280px;
      }
  
  
   
  
    .buttonText {
      color: #4A90E2;
      text-decoration: none;
      font-weight: normal;
      display: block;
      border: 2px solid #585858;
      padding: 10px 80px;
      font-family: Arial;
    }
  
    #supportSection, .supportContent {
      background-color: white;
      font-family: arial;
      font-size: 12px;
      border-top: 1px solid #e4e4e4;
    }
  
    .bodyContent table {
      padding-bottom: 10px;
    }
  
  
    .footerContent p {
      margin: 0;
      margin-top: 2px;
    }
  
    .headerContent.centeredWithBackground {
      background-color: #F4EEE2;
      text-align: center;
      padding-top: 20px;
      padding-bottom: 20px;
    }
        
     @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            h1 {
                font-size: 40px !important;
            }
            
            .content {
                font-size: 22px !important;
            }
            
            .bodyContent p {
                font-size: 22px !important;
            }
            
            .buttonText {
                font-size: 22px !important;
            }
            
            p {
                
                font-size: 16px !important;
                
            }
            
            .footerContent p {
                padding-left: 5px !important;
            }
            
            .mainContainer {
                padding-bottom: 0 !important;   
            }
        }
  </style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="width:100% ;-webkit-text-size-adjust:none;margin:0;padding:0;background-color:#FAFAFA;">
  <center>
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable" style="height:100% ;margin:0;padding:0;width:100% ;background-color:#FAFAFA;">
      <tr>
        <td align="center" valign="top" style="border-collapse:collapse;">
          <table border="0" cellpadding="10" cellspacing="0" width="450" id="templatePreheader" style="background-color:#FAFAFA;">
            <tr>
              <td valign="top" class="preheaderContent" style="border-collapse:collapse;">
                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                  <tr>
                    <td valign="top" style="border-collapse:collapse;">
                                                  </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <table border="0" cellpadding="0" cellspacing="0" width="450" id="templateContainer" style="border:1px none #DDDDDD;background-color:#FFFFFF;">
            <tr>
              <td align="center" valign="top" style="border-collapse:collapse;">
                <table border="0" cellpadding="0" cellspacing="0" width="450" id="templateHeader" style="background-color:#FFFFFF;border-bottom:0;">
                  <tr>
                    <td class="headerContent centeredWithBackground" style="border-collapse:collapse;color:#202020;font-family:Arial;font-size:34px;font-weight:bold;line-height:100%;padding:0;text-align:center;vertical-align:middle;background-color:#F4EEE2;padding-bottom:20px;padding-top:20px;">
                      <img width="130" src="https://atavist-static.s3.amazonaws.com/prototype_assets/Atavist-logo-with-mark.png" style="width:130px;max-width:130px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none;" id="headerImage campaign-icon">
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="border-collapse:collapse;">
                <table border="0" cellpadding="0" cellspacing="0" width="450" id="templateBody">
                  <tr>
                    <td valign="top" class="bodyContent" style="border-collapse:collapse;background-color:#FFFFFF;">
                      <table border="0" cellpadding="20" cellspacing="0" width="100%" style="padding-bottom:10px;">
                        <tr>
                          <td valign="top" style="padding-bottom:1rem;border-collapse:collapse;" class="mainContainer">
                            <div style="text-align:center;color:#505050;font-family:Arial;font-size:14px;line-height:150%;">
                              <h1 class="h1" style="color:#202020;display:block;font-family:Arial;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">Verify Your Email</h1>

                              <p>Please click the button below to verify your email.</p>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" style="border-collapse:collapse;">
                            <table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:10px;">
                              <tbody>
                                <tr align="center">
                                  <td align="center" valign="middle" style="border-collapse:collapse;">
                                    <a class="buttonText" href='.$send_email.' target="_blank" style="color: #4A90E2;text-decoration: none;font-weight: normal;display: block;border: 2px solid #585858;padding: 10px 80px;font-family: Arial;">Verify</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="border-collapse:collapse;">
                <table border="0" cellpadding="10" cellspacing="0" width="450" id="supportSection" style="background-color:white;font-family:arial;font-size:12px;border-top:1px solid #e4e4e4;">
                  <tr>
                    <td valign="top" class="supportContent" style="border-collapse:collapse;background-color:white;font-family:arial;font-size:12px;border-top:1px solid #e4e4e4;">
                      <table border="0" cellpadding="10" cellspacing="0" width="100%">
                        <tr>
                          <td valign="top" width="100%" style="border-collapse:collapse;">
                            <br>
                            <div style="text-align: center; color: #c9c9c9;">
                              <p>Questions? Get your answers here:&nbsp;
                                <a href="http://help.atavist.com" style="color:#4a90e2;font-weight:normal;text-decoration:underline; font-size: 12px;">Help Center</a>.</p>
                            </div>
                            <br>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td align="center" valign="top" style="border-collapse:collapse;">
                <table border="0" cellpadding="10" cellspacing="0" width="450" id="templateFooter" style="background-color:#FFFFFF;border-top:0;">
                  <tr>
                    <td valign="top" class="footerContent" style="padding-left:0;border-collapse:collapse;background-color:#fafafa;">
                      <div style="text-align:center;color:#c9c9c9;font-family:Arial;font-size:11px;line-height:150%;">
                        <p style="text-align:left;margin:0;margin-top:2px;">Atavist | Brooklyn, New York, 11201 | Copyright © 2015 | All rights reserved</p>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <br>
        </td>
      </tr>
    </table>
  </center>
</body>

</html>';

  require '../vendor/phpmailer/phpmailer/src/Exception.php';
  require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require '../vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require '../vendor/autoload.php';
 
 send_mail($email,"Verify Your Email",$html);
 
	$arr = array("status"=> "success", "msg"=> "Email Verfication link has been send successfully.Kindly check your email", "field"=>"message_send","id"=>$wholeseller['id']);
		echo json_encode($arr);

	}


?>