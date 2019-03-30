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
    
    include 'dbcon.php';

$wynik = pg_query($dbconn4, "SELECT points, login FROM employt WHERE 'points' >= '0' ORDER BY points DESC");
while($wynik1 = pg_fetch_array($wynik))
            {
                echo '
                <tr>
               
                <td>Username:'.$wynik1['login'].'</td><br>
                <td>Points:' .$wynik1['points'].'</td><br>
                
                </tr>
                ';
            }

?>

