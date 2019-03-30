<?php 
    if(isset($_POST['forgotpassword'])) {
            include '../dbcon.php';
         $flogin= $_POST['login'];
         $fmail= $_POST['email'];
        $code=substr(md5(mt_rand()),0,15);           
        $check=pg_query($dbconn4, "SELECT * FROM employt WHERE login='$flogin' AND mail='$fmail'");
        $check1 = pg_fetch_assoc($check);
        if($check1 > 0){
        $sql = pg_query ($dbconn4, "UPDATE employt SET t2 = '$code' WHERE mail='$fmail' AND login='$flogin'");
        
        $url = "http://weworkit-online.com/log/verify.php?t2=$code&email=$fmail";
        echo "check your mail";
        mail($fmail, "Password Change", "To change your password,please enter this link: $url", "From:contact@weworkit-online.com\r\n");
        }else {  
}
    pg_close($dbconn4);

    
}


    


    
 ?>
