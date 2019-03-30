<?php

$expire = 365*24*3600; // We choose a one year duration

ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(),session_id(),time()+$expire); 

    error_reporting(E_ALL);

include '../dbcon.php';
    if (!isset($_SESSION['mail']))
    {
        header('Location: ../log/login.html');
        exit();
	}
    if (isset($_POST["changepassword"])) {
    $old=$_POST['oldpassword'];
    $new=$_POST['newpassword'];
    $new_h=password_hash($new, PASSWORD_DEFAULT);
    
        $mail=$_SESSION['mail'];
        
        $pass=pg_query($dbconn4,"SELECT * FROM employt WHERE mail='$mail'");
        $wynik1 = pg_fetch_assoc($pass);
$wynik2 = pg_num_rows($pass);
if($wynik1 == 0){
    echo "Wrong Password";
}else{
if ($wynik1) {

    if (password_verify($old, $wynik1['password'])) {
        pg_query($dbconn4,"UPDATE employt SET password='$new_h' WHERE mail='$mail'");
    }
}
}
    }

?>
<html>
    <head>
        <ink rel="manifest" href="../manifest.json">
    </head>
	<body>
		<form action="resetpasswordonsite.php" method="post">
            <input type="text" name="oldpassword" placeholder="Your Actuall Password"><br>
            <input type="text" name="newpassword" placeholder="Your New Password"><br>
			<input type="submit" name="changepassword" value="Change Password">
		</form>
	</body>
</html>