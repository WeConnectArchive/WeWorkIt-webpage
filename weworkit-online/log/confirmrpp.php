<?php
   

    if (isset($_GET["t1"]) && isset($_GET["email"])) {
    	    include'../dbcon.php';
		$email = ($_GET["email"]);
		$token = ($_GET["t1"]);

		$data = pg_query($dbconn4,"SELECT login FROM pperson WHERE mail='$email' AND t1='$token' ");
        $data1 = pg_num_rows($data);
		if ($data1 > 0) {
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
		//	$str = substr($str, 0, 15);

			    		$password = password_hash($str,PASSWORD_DEFAULT);


			 pg_query($dbconn4, "UPDATE pperson SET t1 = '1' WHERE mail='$email' AND t1='$token'");

			echo "Thanks for confirming your account";
		} else {
			echo "Please check your link!";
		}
	} else {
		header("Location: login.html");
		exit();
	}