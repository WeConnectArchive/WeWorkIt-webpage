<?php 

    if(isset($_POST['submit'])) {
        
    include '../dbcon.php';
         $flogin= $_POST['zlogin'];
         $fmail= $_POST['zmail'];
         $fpassword= $_POST['zpassword'];
         $code=substr(md5(mt_rand()),0,15);           



   
         if ($_POST['zpassword']!= $_POST['rpassword']){
             echo "haslo chuj";

         }else{
        $pass_hash = password_hash($fpassword, PASSWORD_DEFAULT);
        $sql = pg_query ($dbconn4, "INSERT INTO employt(login, mail, password, points, t1) values ( '$flogin', '$fmail' , '$pass_hash', '0', '$code' )"); 
        $url = "http://weworkit-online.com/confirm.php?t1=$code&email=$fmail"; //zmienic php
        
        mail($fmail, "Register Confirmation", "To confirm your register, please visit this: $url", "From:contact@weworkit-online.com\r\n");
    echo "check your mail";

    }
}

    pg_close($dbconn4);

    


    
 ?>
