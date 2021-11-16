<?php 
//mail('kiranksk0512@gmail.com','Testing','this is just to check localhost email','From:kiranksk0512@gmail.com');
$to = "kiranksk0512@gmail.com";
$subject = "Testing";
$message = "this is to test localhost email";
$header = "From:kiranksk0512@gmail.com";
    
    if(mail($to,$subject,$message,$header)){
        echo "Mail hast been sent succesfully!";
    }
    
    else{
        echo "Mail not sent!";
    }


?>