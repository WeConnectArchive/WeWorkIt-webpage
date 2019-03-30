<?php 
session_start();
error_reporting(E_ALL);
include '../dbcon.php';


if (isset($_POST['submitpperson'])) {
   $mail = $_POST['mail'];
   $haslo = $_POST['password'];
if(!$mail && !$haslo){
    echo "please check your inputs";
}else {

    $wynik2 = pg_query($dbconn4,"SELECT * FROM pperson WHERE mail='$mail'");
    $wynik3 = pg_fetch_assoc($wynik2);
    if ($wynik3 == 0){echo "Wrong email or password";}
    if ($wynik3 > 0 ){
      if (password_verify($haslo, $wynik3['password'])){
        $_SESSION['zalogowany'] = true;
        $_SESSION['id'] = $wynik3['ID'];
        $_SESSION['user'] = $wynik3['login'];
        $_SESSION['email'] = $wynik3['mail'];
        unset($_SESSION['blad']);
        header("Location: http://www.weworkit-online.com/pperson/controlpanel.php");      
      }else { echo "Wrong email or password";}
}
}
}
pg_close($dbconn4);

?>