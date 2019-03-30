<?php 
 include '../dbcon.php';
    if(isset($_POST['register'])) {
        
   
         $login= $_POST['login'];
         $mail= $_POST['mail'];
         $password= $_POST['password'];
         $rpassword= $_POST['rpassword'];
         $code=substr(md5(mt_rand()),0,15);           



   
         if ($_POST['password']!= $_POST['rpassword']){
             echo "Passwords did not matched";

         }else{
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = pg_query ($dbconn4, "INSERT INTO pperson (login, mail, password, t1) values ( '$login', '$mail' , '$pass_hash', '$code' )"); 
        $url = "http://weworkit-online.com/log/confirmrpp.php?t1=$code&email=$mail"; //zmienic php

        mail($mail, "Register Confirmation", "To confirm your register, please visit this: $url", "From:contact@weworkit-online.com\r\n");
    echo "check your mail";

    }
}

    pg_close($dbconn4);

    


    
 ?>