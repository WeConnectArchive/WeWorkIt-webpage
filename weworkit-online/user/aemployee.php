<?php

$expire = 365*24*3600; // We choose a one year duration

ini_set('session.gc_maxlifetime', $expire);

session_start(); //We start the session 

setcookie(session_name(),session_id(),time()+$expire); 

    error_reporting(E_ALL);

include 'dbcon.php';
    if (!isset($_SESSION['email']))
    {
        header('Location: ../log/login.html');
    	exit();
	}
$abb = $_SESSION['user'];
        $mail = $_SESSION['email'];
        $about = $_SESSION['about'];
$abc = pg_query($dbconn4,"SELECT * FROM employt WHERE login='$abb'");


                   



if (isset($_POST['btn']))
	{

	$otobie = $_POST['otobie'];
	
    $data = pg_query($dbconn4,"SELECT about FROM employt WHERE mail='$mail'");
    $data1 = pg_num_rows($data);

    if($data1>0){
        $wynik = pg_query($dbconn4,"UPDATE employt SET about='$otobie' WHERE mail='$mail' ");
        header("Location: http://www.weworkit-online.com/user/aemployee.php");
    }


	}
pg_close();
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/builds-dev/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <title>WeWorkIt - Account</title>
    </head>

    <body class="account profilePanel">

        <header class="header profile"> 
            <div class="nav profileNav" id="nav">
                <div class="navContents">
                <ul class="navContentsList">
                    <li class="navContentsListC"><a href="resetpasswordonsite.php">regulamin</a></li>
                    <li class="navContentsListC"><a href="#">contact</a></li>
                    <li class="navContentsListC"><a id="main"><img class="navContentsListCLogo" src="../zdjecia/weworkit1.png"></a></li>
                    <li class="navContentsListC"><a href="logout.php">ranking</a></li>
                    <li class="navContentsListC"><a href="controlpanel.php">control panel</a></li>
                </ul>
                </div>
            </div>
        </header>

        <div class="container account">
            <div class="row">
                <div class="col-sm-3 col-1">
                    <section class="aImg">
                        <img src="../zdjecia/account.png">
                    </section>
                </div>
                <div class="col-sm-8 col-2">
                    <div class="row">
                        <section class="aRanking">
                            <span>
                                <h4>Ranking:</h4>    <p>Nr 1 w Polsce</p>
                            </span>
                        </section>
                    </div>

                    <div class="row">
                        <section class="aAbout">
                            <h3>O mnie</h3>
                            <div class="aAboutPanel">
                                <form id="edit" class="aAboutPanelEdit">
                                    <p id="content" class="aAboutPanelEditContent"><? 

                                    include 'dbcon.php';
                                    $data3 = pg_query($dbconn4,"SELECT about FROM employt WHERE mail='$mail'");
                                   echo pg_result($data3, 0);
                                     ?></p>
                                    <input class="btn btn-primary" onclick="edycja()" value="Edit"/>
                                </form>
                               
                                <form action="aemployee.php" id="save" class="aAboutPanelSave"  method="post">
                                    <textarea form ="save" name="otobie" id="aContent" cols="97" wrap="soft"><?
                                    include '../dbcon.php';
                                    $data3 = pg_query($dbconn4,"SELECT about FROM employt WHERE mail='$mail'");
                                   echo pg_result($data3, 0);
                                     ?></textarea>
                                     <input type="submit" class="btn btn-primary" action="aemployee.php" onclick="zapisz()" value="Save" name="btn">
                                </form>
                            </div>
                        </section>
                    </div>     
                </div>
            </div>

            <script>

                var edit = document.getElementById("edit");
                var save = document.getElementById("save");

                function edycja(){
                    edit.style.display = "none";
                    save.style.display = "block";
                }

                function zapisz(){
                    var x = document.getElementById("aContent").value;
                    document.getElementById("content").innerHTML = x;
                    
                    save.style.display = "none";
                    edit.style.display = "block";
                }

            </script>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-3 col-4"><section class="aLogo"><img src="../zdjecia/weworkit1.png"></section></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-5"><section class="aInfo"></section></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-5">
                                <section class="aSpecial">
                                    <h4>języki obce + poziom</h4>

                                </section></div>    
                            </div>
                        <div class="row">
                            <div class="col-sm-3 col-5">
                                <section class="aOpinions">
                                    <h5>opinie</h5>
                                </section>
                            </div>     
                        </div>
                    </div>
                
                    <div class="col-sm-8 col-6">
                        <section class="aCV">
                            <div class="aCV-main">
                                <div class="left"></div>
                                    <div class="aCV-main-content">
                                        <h1 class="aCV-main-content-header">doświadczenie</h1>
                                        <ul id="ex" class="aCV-main-content-list-ex">
                                            <li class="aCV-main-content-list-ex-el"><input type="text" class="aCV-main-content-list-ex-el-input" name="dos1"> <?/*   include 'dbcon.php';
                                    $data4 = pg_query($dbconn4,"SELECT about FROM employt WHERE mail='$mail'");
                                   echo pg_result($data4, 0); */ ?><button class="delete" type="button">X</button></li>
                                            <li class="aCV-main-content-list-ex-el"><input type="text" class="aCV-main-content-list-ex-el-input"><button class="delete" type="button">X</button></li>
                                        </ul>
                                        <button class="buttonAdd" id="btnEx" type="button">wstaw</button>
                                        

                                        <h1 class="aCV-main-content-header">programy + poziom</h1>

                                        <select>
                                            <option>html</option>
                                            <option>html</option>
                                            <option>html</option>
                                            <option>html</option>
                                        </select>
                                        <ul>
                                            
                                        </ul>

                                        <h1 class="aCV-main-content-header">edukacja + certyfikaty, szkolenia</h1>
                                        <ul id="edc" class="aCV-main-content-list-edc">
                                            <li class="aCV-main-content-list-edc-el"><input type="text" class="aCV-main-content-list-edc-el-input"><button class="delete" type="button">X</button></li>
                                            <li class="aCV-main-content-list-edc-el"><input type="text" class="aCV-main-content-list-edc-el-input"><button class="delete" type="button">X</button></li>
                                        </ul>
                                        <button id="btnEdc" type="button">wstaw</button>

                                    </div>
                                <div class="right"></div>
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
            <script src="../js/builds-dev/scripts.js" type="text/javascript"></script>
        </footer>
    </body>
</html>    