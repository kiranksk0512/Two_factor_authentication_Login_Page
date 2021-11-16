<?php ob_start(); require_once "sessions.php"; ?>
<?php require_once "Functions.php"; ?>
<?php require_once "Sign_Up_style.css"; ?>
<?php require_once "DB.php"; ?>


<?php
    if(isset($_POST["submit_button"]))
    {
      $Email    = mysqli_real_escape_string($Connection,$_POST["email_box"]);
    
      if(empty($Email))
      {
          $_SESSION["SuccessMessage"] = "*Email must be filled";
          Redirect_To("Recover_Account.php");
      }
        
        
      elseif(!multiple_mail_check($Email)){
          
          $_SESSION["message"] = "*Email is not registered";
          Redirect_To("Sign_Up.php");
      }    
    
      else{
          
          global $Connection;
          
          $QUERY = "SELECT * FROM admin_table WHERE email = '$Email'";
          $Execute = mysqli_query($Connection,$QUERY);
          if($admin =mysqli_fetch_assoc($Execute)){
              $admin["username"];
              $admin["token"];
              $subject = "Reset Password";
              $message = 'Hi'.$admin["username"].'Here is the link to reset your password http://localhost/LoginPage/Reset_Password.php?token='.$admin["token"];
              $header = "From:kiranksk0512@gmail.com";
    
              if(mail($Email,$subject,$message,$header)){
                  $_SESSION["message"] = "*Check Email To Reset Password";
                  Redirect_To("Sign_In.php");
                 }
               
              else{
                 $_SESSION["message"] = "*SOMETHING WENT WRONG TRY AGAIN!";
                 Redirect_To("Sign_Up.php");
                   }
   
          }
          else{
              $_SESSION["message"] = "*SOMETHING WENT WRONG TRY AGAIN!";
              Redirect_To("Sign_Up.php");
              
          }
          
          
          
      }    
        
        
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <title> Forgot Password </title>
    
    </head>
    <body>
        
        
        <form class= "credential-box" action="Recover_Account.php" method="post">
            <h1>  </h1>
            
            <input type="email" name="email_box" placeholder="Email address" id="email_address" > <!-- EmailId -->
            
            <input type="submit" name="submit_button" value="Submit" onclick="validate()">
        </form>
        <div><?php echo Message(); ?></div>
        <div><?php echo SuccessMessage(); ?></div>
      
    </body>
</html>