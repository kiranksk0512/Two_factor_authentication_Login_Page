<!DOCTYPE html>
<html>
    <head>
    
    
    
    
    </head>
    
    <body>
        <?php
        $Password = "kiran";//password that need to be hashed
        $CRYPT_BLOWFISH = "$2y$10$";/*10 means 10seconds, it stands for as cost-of-hashing-algorithm, it is proportional to processing time of this algorithm, */
        $salt = "qsjemdkdkejdkjkejdejab";/*min of 22 charecters should be there in salt, other wise hashing algorithm won't work*/
        $Hash = crypt($Password, $CRYPT_BLOWFISH.$salt);
        echo $Hash;
        
        echo "<br>";
        
        //different salts will give different hash's with same password
        $Password = "kiran";
        $CRYPT_BLOWFISH = "$2y$10$";
        $salt = "gvewo9cfhe9ocidocu9hda";
        $Hash = crypt($Password, $CRYPT_BLOWFISH.$salt);
        echo $Hash;
        ?>
    </body>
</html>