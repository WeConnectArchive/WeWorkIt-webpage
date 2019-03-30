<?php
$expire = 365*24*3600; // We choose a one year duration

ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(),session_id(),time()+$expire); 


	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: login.html');
		exit();
	}
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/builds-dev/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>WeWorkIt - Profile</title>
   
</script>
    </head>

    <body class="profilePanel">

        <header class="header profile"> 
            <div class="nav profileNav" id="nav">
                <div class="navContents">
                <ul class="navContentsList">
                    <li class="navContentsListC"><a href="mess.php">regulamin</a></li>
                    <li class="navContentsListC"><a href="#">contact</a></li>
                    <li class="navContentsListC"><a id="main"><img class="navContentsListCLogo" src="zdjecia/weworkit1.png"></a></li>
                    <li class="navContentsListC"><a href="#">ranking</a></li>
                    <li class="navContentsListC"><a href="aemployee.php">konto</a></li>
                     <li class="navContentsListC"><a href="logout.php">Log Out</a></li>
                </ul>
                </div>
            </div>
        </header>

        <div class="container controlPanel">
            <h1>Control Panel</h1>
            <div class="row">
              <div class="col-sm">
               
                <section class="alerts">
                    <div class="alerts-Container sm">
                        <div class="infoDropdown"><p>alerts</p></div>

                    </div>
                </section>

              </div>
              <div class="col-sm">
                <section class="search">
                    <div class="search-Container sm">
                        <div class="infoDropdown"><p>search</p></div>
                    </div>
                </section>
              </div>
              <div class="col-sm">
                <section class="scoreboard">

                    <div class="scoreboard-Container lg">
                        <div class="infoDropdown"><p>Scoreboard</p></div>

                    </div>

                </section>
              </div>
            </div>

            <div class="row">
                <div class="col-sm">
                      
                    <section class="yourStats">
                        <div class="yourStats-Container lg">
                            <div class="infoDropdown"><p>your Status</p></div>
                            <?php
                                echo "Points:".$_SESSION['points'];
                                var_dump($_SESSION['id']);
                            ?>
                        </div>
                    </section>
      
                </div>
                <div class="col-sm">
                    <section class="news">
                        <div class="news-Container sm">
                            <div class="infoDropdown"><p>news</p></div>
                        </div>
                    </section>
                </div>
                <div class="col-sm null"></div>
            </div>

            <div class="row">
                <div class="col-sm null"></div>
                <div class="col-sm">
                    <section class="messenger">
                        <div class="messenger-Container sm">
                            <div class="infoDropdown"><p>messenger</p></div>
                        </div>
                    </section>
                </div>
                <div class="col-sm">
                    <section class="help">
                        <div class="help-Container sm">
                            <div class="infoDropdown"><p>Help</p></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
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
    </body>
</html>    