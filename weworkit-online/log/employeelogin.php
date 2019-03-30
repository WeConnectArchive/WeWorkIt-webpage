<?php 
session_start();
error_reporting(E_ALL);
include '../dbcon.php';
if (isset($_POST['submitemployee'])) {
    
       $mail = $_POST['mail'];
       $haslo = $_POST['password'];
    if(!$mail && !$haslo){
        echo "please check your inputs";
    }else {
        $wynik = pg_query($dbconn4,"SELECT * FROM employt WHERE mail='$mail'");
        $wynik1 = pg_fetch_assoc($wynik);
        if ($wynik1 == 0){ echo "wrong email or password";}   
        if ($wynik1) {
            if (password_verify($haslo, $wynik1['password'])) {
                
                $_SESSION['zalogowany'] = true;
                $_SESSION['id'] = $wynik1['ID'];
                $_SESSION['user'] = $wynik1['login'];
                $_SESSION['email'] = $wynik1['mail'];
                $_SESSION['points'] = $wynik1['points'];
                $_SESSION['about'] = $wynik1['about'];
                            unset($_SESSION['blad']); 
                            pg_free_result($wynik);
                header("Location: http://www.weworkit-online.com/user/controlpanel.php");
            }else {echo "wrong email or password";}
        }
    }
}

pg_close($dbconn4);
?>