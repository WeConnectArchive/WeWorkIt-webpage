<?php

$expire = 365*24*3600; // We choose a one year duration

ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(),session_id(),time()+$expire); 


    if (!isset($_SESSION['zalogowany']))
	{
		header('Location: ../log/login.html');
		exit();
	}

echo $_SESSION['id'];
echo $_SESSION['email'];
echo $_SESSION['user'];


?>
