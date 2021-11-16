<?php require_once "sessions.php"; ?>
<?php require_once "Functions.php"; ?>
<?php require_once "DB.php"; ?>


<?php
global $Connection;
if(isset($_GET['token'])){
    $Token_from_URL = $_GET['token'];
    $Query = "UPDATE admin_table SET active='ON' WHERE token ='$Token_from_URL'"; 
    $Execute = mysqli_query($Connection,$Query);
    if($Execute){
        $_SESSION["message"] = "Account Activated Succesfully";
        Redirect_To("Sign_In.php");
    }else{
        $_SESSION["message"] = "SOMETHING WENT WRONG TRY AGAIN!";
        Redirect_To("Sign_Up.php");
    }
    
    
}








?>