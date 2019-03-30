<?php
$expire = 365*24*3600; // We choose a one year duration

ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(),session_id(),time()+$expire); 


  if (!isset($_SESSION['email']))
	{
		header('Location: ../log/login.html');
		exit();
	} 
?>

<!DOCTYPE html>
    <head>
        <ink rel="manifest" href="../manifest.json">
        <link rel="stylesheet prefetch" href="https://kenwheeler.github.io/slick/slick/slick.css">
        <link rel="stylesheet prefetch" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="../css/builds-dev/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <title>WeWorkIt - Profile</title>
    </head>

    <body class="profilePanel">

        <header class="header profile"> 
            <div class="nav profileNav" id="nav">
                <div class="navContents">
                <ul class="navContentsList">
                    <li class="navContentsListC"><a href="report.php">report</a></li>
                    <li class="navContentsListC"><a href="commisionshow.php">contact</a></li>
                    <li class="navContentsListC"><a id="main"><img class="navContentsListCLogo" src="../zdjecia/weworkit1.png"></a></li>
                    <li class="navContentsListC"><a href="ranking.php">ranking</a></li>
                    <li class="navContentsListC"><a href="aemployee.php">konto</a></li>
                </ul>
                </div>
            </div>
        </header>

        <section class="controlPanel">
            <div class="controlPanel-carousel">
                <div class="slick-carousel">
                    <div class="slick-slide">
                        1
                    </div>
                    <div class="slick-slide">
                        2
                    </div>
                    <div class="slick-slide">
                        3
                    </div>
                    <div class="slick-slide">
                        4
                    </div>

            </div>

            </div>

       </section>

        <footer>
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
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"type="text/javascript"></script>
        <script type="text/javascript" src="http://kenwheeler.github.io/slick/slick/slick.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="../js/builds-dev/carousel.js" type="text/javascript"></script>
    </body>
</html>    