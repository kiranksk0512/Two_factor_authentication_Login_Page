<?php ob_start(); require_once "sessions.php"; ?>
<?php require_once "Functions.php"; ?>
<?php require_once "Sign_In_style.css"; ?>
<?php require_once "DB.php"; ?>



<?php

    if(isset($_POST["submit_button"]))
    {
      $Email    = mysqli_real_escape_string($Connection,$_POST["email_box"]);
      $Password = mysqli_real_escape_string($Connection,$_POST["pass_box"]);  
        
      if(empty($Email)||empty($Password))
      {
          $_SESSION["message"] = "*All Fields must be filled out";
          Redirect_To("Sign_In.php");
      }
    
        
      else{ if(multiple_mail_check($Email)){
             if(Confirming_active_status($Email))
                 
             {   $Found_Account =  Login_Attempt($Email,$Password);
                 if($Found_Account)
               { global $Connection_DB;
                $Hashed_Password = PasswordEncryption($Password);
                $SQL_QUERY_STRING ="UPDATE admin_table SET password='$Hashed_Password' WHERE email ='$Email'";
                $Execute = mysqli_query($Connection,$SQL_QUERY_STRING);
                if($Execute){ 
                     $_SESSION["USER_ID"] = $Found_Account['id'];
                     $_SESSION["USER_Name"] = $Found_Account['username'];
                     $_SESSION["USER_ID"] = $Found_Account['email'];
                     
                     if(isset($_POST["Remember_me"])){
                         $ExpireTime = time()+86400;
                         setcookie("SettingEmail",$Email,$ExpireTime);
                         setcookie("SettingName",$Username,$ExpireTime);
                     }
                     
                     header('Location:http://'.$_SERVER['HTTP_HOST'].'/LoginPage/welcome.php');
                }
                else{$_SESSION["message"] = "*SOMETHING WENT WRONG TRY AGAIN!";
                 Redirect_To("Sign_In.php");}
               }
               else
               {  $_SESSION["message"] = "*Invalid Email / Password";
                  Redirect_To("Sign_In.php");     
               }
             }
             else{
                 $_SESSION["message"] = "*Account Confirmation required";
                 Redirect_To("Sign_In.php");
             }
          }else{
          $_SESSION["message"] = "*This Email is not registered";
                 Redirect_To("Sign_In.php");
      }
        }    
    }

?>
<!DOCTYPE html>
<html>
    <head>
        
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <title> Log In </title>
    
    </head>
    <body>
        
        
        
        <form class= "credential-box" action="Sign_In.php" method="post">
             
            <h1> Log In </h1>
            <input type="text" name="email_box" placeholder="Email address" id="email_address" > <!-- EmailId -->
            <input type="password" name="pass_box" placeholder="Password" id="password" ><!-- Password -->
             <input type="checkbox" name="Remember_me" value="Remember">
            <input type="submit" name="submit_button" value="Log In" >
            
            <div class="clearfix"></div>
            <a href="Sign_Up.php">Don't have an account? Create One!</a>
            <div class="clearfix1"></div>
            <a class="firstlink" href="Recover_Account.php"> Forgot password?</a>
        </form>
       
        <p>Remember me<p>

        <div><?php echo Message(); ?></div>
        <div><?php echo SuccessMessage(); ?></div>
        
    </body>
</html>