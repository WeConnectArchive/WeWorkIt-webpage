<?php 
if(isset($SESSION['email'])){ session_destroy();}else{
session_start();
error_reporting(E_ALL);
include '../dbcon.php';
if (isset($_POST['submitcompany'])) {

       $mail = $_POST['mail'];
       $haslo = $_POST['password'];
    if(!$mail && !$haslo){
        echo "please check your inputs";
    }else {
        $wynik4 = pg_query($dbconn4,"SELECT * FROM company WHERE mail='$mail'");
        $wynik5 = pg_fetch_assoc($wynik4);
        if ($wynik5 == 0){echo "wrong email or password";}
        if ($wynik5 > 0){
      
            if (password_verify($haslo, $wynik5['password'])){
              $_SESSION['zalogowany'] = true;
              $_SESSION['id'] = $wynik5['ID'];
              $_SESSION['companyname'] = $wynik5['companyname'];
              $_SESSION['companyemail'] = $wynik5['mail'];
              unset($_SESSION['blad']);
              header("Location: http://www.weworkit-online.com/company/controlpanel.php");      
      }else {echo "wrong email or password";}
    }
    }
}
}
pg_close($dbconn4);
?>