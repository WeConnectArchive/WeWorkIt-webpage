<?php
session_start();
error_reporting(E_ALL);


if (isset($_POST['submitpperson'])) {
include '../dbcon.php';
   $mail = $_POST['mail'];
   $haslo = $_POST['password'];
if(!$mail && !$haslo){
    echo "please check your inputs";
}else {

    $wynik2 = pg_query($dbconn4,"SELECT * FROM pperson WHERE mail='$mail'");
    $wynik3 = pg_fetch_assoc($wynik2);
    if ($wynik3 > 0 ){
      if (password_verify($haslo, $wynik3['password'])){
        $_SESSION['zalogowany'] = true;
        $_SESSION['id'] = $wynik3['ID'];
        $_SESSION['user'] = $wynik3['login'];
        $_SESSION['email'] = $wynik3['mail'];
        unset($_SESSION['blad']);
        header("Location: http://www.weworkit-online.com/pperson/controlpanel.php");      
      }else { echo "Wrong email or password";}
}else {echo "wrong email or password";}
}
}
if (isset($_POST['submitcompany'])) {
    include '../dbcon.php';
       $mail = $_POST['mail'];
       $haslo = $_POST['password'];
    if(!$mail && !$haslo){
        echo "please check your inputs";
    }else {
        $wynik4 = pg_query($dbconn4,"SELECT * FROM company WHERE mail='$mail'");
        $wynik5 = pg_fetch_assoc($wynik4);
        if ($wynik5 > 0){
      
            if (password_verify($haslo, $wynik5['password'])){
              $_SESSION['zalogowany'] = true;
              $_SESSION['id'] = $wynik5['ID'];
              $_SESSION['companyname'] = $wynik5['companyname'];
              $_SESSION['email'] = $wynik5['mail'];
              unset($_SESSION['blad']);
              header("Location: http://www.weworkit-online.com/company/controlpanel.php");      
      }else {echo "wrong email or password";}
    }else {echo "wrong email or password";}
}
}
    if (isset($_POST['submitemployee'])) {
        include '../dbcon.php';
           $mail = $_POST['mail'];
           $haslo = $_POST['password'];
        if(!$mail && !$haslo){
            echo "please check your inputs";
        }else {
            $wynik = pg_query($dbconn4,"SELECT * FROM employt WHERE mail='$mail'");
            $wynik1 = pg_fetch_assoc($wynik);   
            if ($wynik1 > 0) {
                if (password_verify($haslo, $wynik1['password'])) {
                    
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['id'] = $wynik1['ID'];
                    $_SESSION['user'] = $wynik1['login'];
                    $_SESSION['email'] = $wynik1['mail'];
                    $_SESSION['points'] = $wynik1['points'];
                    $_SESSION['about'] = $wynik1['about'];
                                unset($_SESSION['blad']); 
                    header("Location: http://www.weworkit-online.com/user/controlpanel.php");
                }else {echo "wrong email or password";}
            }else {echo "wrong email or password";}
        }
    }
 
pg_close($dbconn4);

    ?>