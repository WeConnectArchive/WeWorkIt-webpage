<?php 

$expire = 365*24*3600; // We choose a one year duration

ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(),session_id(),time()+$expire); 

$fmail = "alerts@weworkit-online.com";
if(isset($_POST['sub'])){
    $random = $_POST['email'];
    $login = $_POST['login'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    
 if(!$desc){ echo "please describe your problem";
        }
        else {echo "Your report has been send";
            mail($fmail, "$title", "$desc , $login, $random");}}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <ink rel="manifest" href="../manifest.json">
        <link rel="stylesheet" type="text/css" href="../css/builds-dev/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
    </head>
    <body>
        <header class="header login">
                <div class="nav registerNav" id="nav">
                <div class="navContents">
                    <ul class="navContentsList">
                        <li class="navContentsListC"><a href="#">regulamin</a></li>
                        <li class="navContentsListC"><a href="#">contact</a></li>
                        <li class="navContentsListC"><a href="#">ranking</a></li>
                        <li class="navContentsListC"><a id="main" href="../index.html"><img class="navContentsListCLogo" src="../zdjecia/weworkit1.png"></a></li>
                        <li class="navContentsListC"><a id="aboutus" href="#">about us</a></li>
                        <li class="navContentsListC"><a href="login.html">login</a></li>
                        <li class="navContentsListC"><a href="#" aria-disabled="true">register</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <section class="container-fluid report">
            <div class="row report-content">
                <div class="col-4 report-content-personal">
                    <h2 class="report-content-personal-title">Report the problem</h2>
                    <form class="report-content-personal-form" action="report.php" method="post">
                        <label class="report-content-personal-form-label">Login</label>
                        <input class="report-content-personal-form-input login" type="text" name="login" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>">
                        
                        <label class="report-content-personal-form-label">E-mail</label>
                        <input class="report-content-personal-form-input email" type="text" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>">
                    </form>
                </div>
                <!-- <i class="fa fa-cog" aria-hidden="true"></i> -->
                <div class="col-8 report-content-problem">
                    <form class="report-content-problem-form" action="report.php" method="post">
                        <label class="report-content-problem-form-title">Title</label>
                        <input class="report-content-problem-form-input" type="text" name="title">
                        
                        <textarea class="report-content-problem-form-textarea" placeholder="Description problem" name="?"></textarea>
                        <input type="submit" class="report-content-problem-form-button" value="Send" name="sub">
                    </form>
                </div>
            </div>
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
    </body>
</html>