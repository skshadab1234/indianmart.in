<?php
session_start();
include('database.inc.php');
include('function.inc.php');
function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email  = get_safe_value($_POST['email']);
    $password=get_safe_value($_POST['password']);
         
     
      if (!empty($email) && !empty($password)) {
           if(!checkemail($email)){
    $arr=array('status'=>'error','msg'=>'Enter Correct Email address','field'=>'email_error');
    echo json_encode($arr);

    }else{
           $query = "SELECT * FROM retailers WHERE retailer_email = '$email'";  
           $result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_assoc($result))  
                {  
                     if(password_verify($password, $row["retailer_password"]))  
                     {  
                          $_SESSION["RETAIL_EMAIL"] = $email; 
                          $_SESSION["RETAIL_ID"] = $row['id'];  
          $arr=array('status'=>'success','msg'=>'Wait a minute....redirecting','field'=>'success_field');
        echo json_encode($arr);
                     }  
                     else  
                     {  
                          //return false;  
                     $arr=array('status'=>'error','msg'=>'Email or Password is incorredt','field'=>'password_error');
                echo json_encode($arr);
                          
                     }  
                }  
           }  
    }
      }else{
    $arr=array('status'=>'error','msg'=>'Both field are required','field'=>'password_error');
    echo json_encode($arr);

      }
}

