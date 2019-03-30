<?php
    error_reporting(E_ALL);
$token = ($_GET["t2"]);
$email = $_GET['email'];
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

include '../dbcon.php';
        var_dump($email);
        var_dump($token);
        var_dump($actual_link);
    if (isset($_POST['changepassword'])) {
        $old=$_POST['npassword'];
    $new=$_POST['rnpassword'];
        $new_h=password_hash($new, PASSWORD_DEFAULT);

            pg_query($dbconn4,"UPDATE employt SET password = '$new_h' WHERE mail='$email' AND t2='$token'");

    }

?>
<html>
<header><?php $token = ($_GET["t2"]);
$email = $_GET['email'];
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?> </header>
	<body>
		<form action="<?php $actual_link ?>" method="post">
            <input type="text" name="npassword" placeholder="Your New Password"><br>
            <input type="text" name="rnpassword" placeholder="Confirm Your New Password"><br>
			<input type="submit" name="changepassword" value="Change Password">
		</form>
	</body>
</html>