<?php ob_start(); require_once "sessions.php"; ?>
<?php require_once "Functions.php"; ?>
<?php require_once "Sign_Up_style.css"; ?>
<?php require_once "DB.php"; ?>


<?php

    if(isset($_GET['token'])){
    $Token_from_URL = $_GET['token'];
    if(isset($_POST["submit_button"]))
    {
      
      $Password = mysqli_real_escape_string($Connection,$_POST["pass_box"]);
      $ConfirmPassword = mysqli_real_escape_string($Connection,$_POST["cpass_box"]);
         
        
      if(empty($Password)||empty($ConfirmPassword))
      {
          $_SESSION["Message2"] = "*All Fields must be filled out";
          
      }
        
      elseif($Password !== $ConfirmPassword){
          
          $_SESSION["Message2"] = "*Both Passwords must match";
          
      }
        
      elseif(strlen($Password)<8){
          
          $_SESSION["Message2"] = "*Passwords must have at least 8 characters";
          
      }
        
          
    
      else{
          
          global $Connection_DB;
          $Hashed_Password = PasswordEncryption($Password);
          $Query = "UPDATE admin_table SET password='$Hashed_Password' WHERE token ='$Token_from_URL'"; 
          $Execute = mysqli_query($Connection,$Query);
          if($Execute){
              $_SESSION["message"] = "Password Changed Succesfully";
              Redirect_To("Sign_In.php");
          }else{
              $_SESSION["message"] = "SOMETHING WENT WRONG TRY AGAIN";
              Redirect_To("Sign_In.php");
              
          }
 
    }
    }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <title> Create New Password </title>
    
    </head>
    <body>
        
        
        <form class= "credential-box" action="Reset_Password.php?token=<?php echo $Token_from_URL; ?>" method="post">
            <h1> Create New Password </h1>
            
            <input type="password" name="pass_box" placeholder="Password" id="password" ><!-- Password -->
            <input type="password" name="cpass_box" placeholder="Confirm Password" id="confirm_password"><!-- Confirm Password -->
            <input type="submit" name="submit_button" value="Submit" onclick="validate()">
        </form>
        <div><?php echo Message(); ?></div>
        <div><?php echo SuccessMessage(); ?></div>
        <div><?php echo Message2(); ?></div>
       
    </body>
</html>