<?php require_once "sessions.php"; ?>
<?php require_once "Functions.php"; ?>
<?php
$_SESSION["USER_ID"] = "null";
session_destroy();
$ExpireTime = time()-86400;
setcookie("SettingEmail",null,$ExpireTime);
setcookie("SettingName",null,$ExpireTime);
Redirect_To("Sign_In.php");




?>