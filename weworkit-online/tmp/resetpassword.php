<?php
   

    if (isset($_GET["token"]) && isset($_GET["email"])) {
		    include'dbcon.php';
		$email = ($_GET["email"]);
		$token = ($_GET["token"]);

		$data = pg_query($dbconn4,"SELECT login FROM employt WHERE mail='$email' AND token='$token' ");
        $data1 = pg_num_rows($data);
		if ($data1 > 0) {
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
		//	$str = substr($str, 0, 15);

			    		$password = password_hash($str,PASSWORD_DEFAULT);


			 pg_query($dbconn4, "UPDATE employt SET password = '$password', token = '' WHERE mail='$email'");

			echo "Your new password is: $str";
		} else {
			echo "Please check your link!";
		}
	} else {
		header("Location: login.html");
		exit();
	}
?>