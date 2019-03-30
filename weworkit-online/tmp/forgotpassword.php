<?php 
    include 'dbcon.php';

    if(isset($_POST['submit'])) {
        
         $flogin= $_POST['zlogin'];
         $fmail= $_POST['zmail'];
         $code=substr(md5(mt_rand()),0,15);           
         $code2=substr(md5(mt_rand()),0,15);          
         $sql=pg_query($dbconn4, "UPDATE employt  SET t2 = '$code' WHERE mail='$zemail' AND login='$zlogin'");
        $url = "http://weworkit-online.com/confirm.php?t1=$code&email=$fmail"; //zmienic php

        mail($email, "Register Confirmation", "To confirm your register, please visit this: $url", "From:contact@weworkit-online.com\r\n");
         

    }


    pg_close($dbconn4);
 ?>
<html>
    <body>
		<form action="forgotpassword.php" method="post">
			<input type="text" name="zlogin" placeholder="login"><br>
            <input type="text" name="zemail" placeholder="Email"><br>
			<input type="submit" name="forgotpassword" value="Request Password">
		</form>
	</body>
</html>