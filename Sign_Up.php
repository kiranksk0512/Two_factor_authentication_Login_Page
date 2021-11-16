
<?php ob_start(); require_once "sessions.php"; ?>
<?php require_once "Functions.php"; ?>
<?php require_once "Sign_Up_style.css"; ?>
<?php require_once "DB.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>



<?php
    if(isset($_POST["submit_button"]))
    {
      $Username = mysqli_real_escape_string($Connection,$_POST["name_box"]);
      $Email    = mysqli_real_escape_string($Connection,$_POST["email_box"]);
      $Password = mysqli_real_escape_string($Connection,$_POST["pass_box"]);
      $ConfirmPassword = mysqli_real_escape_string($Connection,$_POST["cpass_box"]);
      $Token = bin2hex(openssl_random_pseudo_bytes(40));    
        
      if(empty($Username)||empty($Email)||empty($Password)||empty($ConfirmPassword))
      {
          $_SESSION["message"] = "*All Fields must be filled out";
          Redirect_To("Sign_Up.php");
      }
        
      elseif($Password !== $ConfirmPassword){
          
          $_SESSION["message"] = "*Both Passwords must match";
          Redirect_To("Sign_Up.php");
      }
        
      elseif(strlen($Password)<8){
          
          $_SESSION["message"] = "*Passwords must have at least 8 characters";
          Redirect_To("Sign_Up.php");
      }
        
      elseif(multiple_mail_check($Email)){
          
          $_SESSION["message"] = "*Email has already been taken";
          Redirect_To("Sign_Up.php");
      }    
    
      else{
          
          global $Connection_DB;
          $Hashed_Password = PasswordEncryption($Password);
          $SQL_QUERY_STRING = "INSERT INTO admin_table(username,email,password,token,active)
                               VALUES('$Username','$Email','$Hashed_Password','$Token','OFF')";
          $Execute = mysqli_query($Connection,$SQL_QUERY_STRING);
          if($Execute){
              $subject = "Confirm Account";
              $message = 'Hi'.$Username.'Here is the link to activate your account http://localhost/LoginPage/Activate.php?token='.$Token;
              $header = "From:kiranksk0512@gmail.com";
    
              if(mail($Email,$subject,$message,$header)){
                  $_SESSION["message"] = "*Check Email for Activation";
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
        <title> Sign Up </title>
    
    </head>
    <body>
 
            
        
        
        <form class= "credential-box" action="Sign_Up.php" method="post">
            
            <h1> Sign Up </h1>
            <input type="text" name="name_box" placeholder="Username" id="username"  >  
            <input type="email" name="email_box" placeholder="Email address" id="email_address" > 
            <input type="password" name="pass_box" placeholder="Password" id="password" >
            <input type="password" name="cpass_box" placeholder="Confirm Password" id="confirm_password">
            <input type="submit" name="submit_button" value="Sign Up" onclick="validate()">
            <div class="clearfix"></div>
            <a href="Sign_In.php">Already a member? Login Now!</a>
        </form> 
        <div> <?php echo Message(); ?></div>
        <div><?php echo SuccessMessage(); ?></div>
        <div id="loader-container">
            <div class="loader-div">
            <div class="loader-div">
            <div class="loader-div">
            <div class="loader-div"> 
            <div class="loader-div">

            </div>

            </div>

            </div>

            </div>

            </div>

        </div>
        <script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".loader-container").fadeOut("slow");;
	});
</script>
        
        
    </body>
</html>