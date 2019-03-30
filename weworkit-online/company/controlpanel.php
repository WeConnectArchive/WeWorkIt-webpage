<?php
if(isset($SESSION['email'])){ session_destroy();}
$expire = 365*24*3600; // We choose a one year duration

ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(),session_id(),time()+$expire); 

if (session_status() == PHP_SESSION_ACTIVE) {
  echo 'Session is active';
}

    if (!isset($_SESSION['zalogowany']))
	{
		header('Location: ../log/login.html');
		exit();
	}

echo $_SESSION['id'];
echo $_SESSION['companyemail'];
echo $_SESSION['companyname'];


?>
<body>
<a href="../user/formcomission.php">Add Commision</a>
</body>