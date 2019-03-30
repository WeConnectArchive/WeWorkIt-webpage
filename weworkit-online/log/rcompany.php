<?php 
 include '../dbcon.php';
    if(isset($_POST['cregister'])) {
        
   
         $cmpname= $_POST['cmpname'];
         $mail= $_POST['mail'];
         $nip= $_POST['nip'];
         $password= $_POST['password'];
         $rpassword= $_POST['rpassword'];
         $code=substr(md5(mt_rand()),0,15);           

        var_dump($cmpname);
        var_dump($mail);
   
         if ($_POST['password']!= $_POST['rpassword']){
             echo "Passwords did not matched";

         }else{
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = pg_query ($dbconn4, "INSERT INTO company (CompanyName, mail, NIP, password, t1) values ( '$cmpname', '$mail' , '$nip', '$pass_hash', '$code' )"); 
        $url = "http://weworkit-online.com/log/confirmcp.php?t1=$code&email=$mail"; //zmienic php

        mail($mail, "Register Confirmation", "To confirm your register, please visit this: $url", "From:contact@weworkit-online.com\r\n");
    echo "check your mail";

    }
}

    pg_close($dbconn4);

    


    
 ?>