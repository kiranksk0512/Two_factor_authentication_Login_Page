<?php require_once "DB.php"; ?>

<?php

       function Redirect_To($New_location){
           
           header("Location:".$New_location,FALSE);
           exit;
   
       }


        function PasswordEncryption($password){
            
            $CRYPT_BLOWFISH = "$2y$10$";
            $salt_length = 22;
            $salt = Generate_randomSalt($salt_length);
            $Hash = crypt($password,$CRYPT_BLOWFISH.$salt);
            return $Hash;     
        }
echo "<br>";
        
        function Generate_randomSalt($length){
            $unique_random_string = md5(uniqid(mt_rand(),TRUE));
            $Base64_string = base64_encode($unique_random_string);
            $Modified_Base64_string = str_replace("+",".",$Base64_string);
            $salt = substr_replace($Modified_Base64_string,0,$length);
            return $salt;    
        }
echo "<br>";
        
        function password_check($password,$Existing_Hash){
            $Hash = crypt($password,$Existing_Hash);
            if($Hash === $Existing_Hash)
            {return true;}
            else
            {return false;}
         }



function multiple_mail_check($Email){
    global $Connection;
    $Query = "SELECT * FROM admin_table WHERE email = '$Email'";
    $Execute = mysqli_query($Connection,$Query);
    
    if(mysqli_num_rows($Execute)>0)
    {return true;}
    else
    {return false;}
    
}

function Login_Attempt($Email,$Password){
    global $Connection;
    $Query = "SELECT * FROM admin_table WHERE email ='$Email'";
    $Execute = mysqli_query($Connection,$Query);
    $Details_of_that_Email = mysqli_fetch_assoc($Execute);
    $Existing_Hash_Password = $Details_of_that_Email["password"];
    if(password_check($Password,$Existing_Hash_Password))
    {return $Details_of_that_Email;}
    else
    {return null;}

}

function Confirming_active_status($Email){
    global $Connection;
    $Query = "SELECT * FROM admin_table WHERE email ='$Email'";
    $Execute = mysqli_query($Connection,$Query);
    $Details_of_that_Email = mysqli_fetch_array($Execute);
    $Active_cln_status = $Details_of_that_Email["active"];
    if($Active_cln_status == "ON")
    {return TRUE;}
    else
    {return FALSE;}
  
}

function login_session_variables_check(){
    if(isset($_SESSION["USER_ID"])||$_COOKIE["SettingEmail"]){
        return true;
    }
    
}

function confirmlogin_through_sessionvariables(){
    if(!login_session_variables_check()){
        $_SESSION["message"] = "*You have to login first";
        Redirect_To("Sign_In.php");
    }
    
}
    


        
?>       
    








