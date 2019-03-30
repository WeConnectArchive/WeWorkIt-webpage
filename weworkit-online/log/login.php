<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "session is active";
session_unset();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <ink rel="manifest" href="../manifest.json">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/builds-dev/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>WeWorkIt - Log in</title>
    <script src="../js/builds-dev/scripts.js"></script>
</head>
<body class="loginPanel" onload="radiolog()">

    <header class="header login">
      <div class="nav loginNav" id="nav">
        <div class="navContents">
          <ul class="navContentsList">
            <li class="navContentsListC"><a href="#">regulamin</a></li>
            <li class="navContentsListC"><a href="#">contact</a></li>
            <li class="navContentsListC"><a href="#">ranking</a></li>
            <li class="navContentsListC"><a id="main" href="../index.html"><img class="navContentsListCLogo" src="../zdjecia/weworkit1.png"></a></li>
            <li class="navContentsListC"><a id="aboutus" href="#">about us</a></li>
            <li class="navContentsListC"><a href="#" aria-disabled="true">login</a></li>
            <li class="navContentsListC"><a href="rEmployee.html">register</a></li>
          </ul>
        </div>
      </div>
    </header>

    <section id="panelLogowania" class="panel-login">
      <div class="panel-login-container">
        <div class="panel-login-container-logo">
          <img src="../zdjecia/weworkit1.png">
        </div>
        <form class="formSwitchPanel">
          <fieldset class="toggle-switch">
            <input type="radio" id="ppersonRadio" name="contact" class="pperson-radio" checked="checked" onclick="radiolog()">
            <input type="radio" id="companyRadio" name="contact" class="company-radio" onclick="radiolog()">
            <input type="radio" id="employeeRadio" name="contact" class="employee-radio" onclick="radiolog()">
            <label for="ppersonRadio">Private person</label>
            <label for="companyRadio">Company</label>
            <label for="employeeRadio">Employee</label>
            <span></span>
          </fieldset>
        </form>
        <form class="formlogin" id="ppersonSection" action="ppersonlogin.php" method="post">
          <input class="log inputS" type="mail" name="mail" placeholder="mail">
          <input class="pass inputS" type="password" name="password" placeholder="Password">
          <a class="forgotpasswordbtn" href="forgotpassword.html">1</a>
          <input class="zaloguj inputS" type="submit" name="submitpperson" value="Zaloguj">
          <input class="register inputS" type="submit"  value="Zarejestruj">
        </form>  
        <form class="formlogin" id="companySection" action="companylogin.php" method="post">
          <input class="log inputS" type="mail" name="mail" placeholder="mail">
          <input class="pass inputS" type="password" name="password" placeholder="Password">
          <a class="forgotpasswordbtn" href="forgotpassword.html">2</a>
          <input class="zaloguj inputS" type="submit" name="submitcompany" value="Zaloguj">
          <input class="register inputS" type="submit"  value="Zarejestruj">
        </form>  
        <form class="formlogin" id="employeeSection" action="employeelogin.php" method="post">
          <input class="log inputS" type="mail" name="mail" placeholder="mail">
          <input class="pass inputS" type="password" name="password" placeholder="Password">
          <a class="forgotpasswordbtn" href="forgotpassword.html">3</a>
          <input class="zaloguj inputS" type="submit" name="submitemployee" value="Zaloguj">
          <input class="register inputS" type="submit"  value="Zarejestruj">
        </form>  
      </div>
    </section>

    <section id="reklama">
      <div class="reklama-content"></div>

    </section>

    <footer class="footer">
        <div class="footericon">
          <ul>
            <li class="fb-icon">
              <a href="#">
                <span>  </span>
                <span>  </span>
                <span>  </span>
                <span>  </span>
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="gg-icon">
              <a href="#">
                <span>  </span>
                <span>  </span>
                <span>  </span>
                <span>  </span>
                <i class="far fa-envelope"></i>
              </a>
            </li>
          </ul>
        </div>
      </footer>
    <script src="../js/builds-dev/scripts.js"></script>
</body>
</html>