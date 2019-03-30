<?php
 
(isset($_POST["type"])) ? $type = $_POST["type"] : $type=1;
 
?>

<!DOCTYPE html>

    <head>
        <ink rel="manifest" href="../manifest.json">
        <link rel="stylesheet" type="text/css" href="../css/builds-dev/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      
        <title>WeWorkIt - Comission</title>
    </head>
    <body>



        <header class="header formComissionheader"> 
            <div class="nav" id="nav">
                <div class="navContents">
                    <ul class="navContentsList">
                        <li class="navContentsListC"><a href="#">regulamin</a></li>
                        <li class="navContentsListC"><a href="#">contact</a></li>
                        <li class="navContentsListC"><a href="#">ranking</a></li>
                        <li class="navContentsListC"><a id="main"><img class="navContentsListCLogo" src="../zdjecia/weworkit1.png"></a></li>
                        <li class="navContentsListC"><a id="aboutus" href="#">about us</a></li>
                        <li class="navContentsListC"><a href="login.html">login</a></li>
                        <li class="navContentsListC"><a id="signin" href="#">register</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <section id="formComission" class="formComission">
            <div class="container">
                <div class="row formComission-Section">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="formComission-Section-img">
                                <img src="../zdjecia/account.png">
                            </div>
                        </div>
                        <div class="row">
                            <div class="formComission-Section-info">

                            </div>
                        </div>
                        <div class="row">
                            <form  action="commisionadd.php" method="post">
                            <button type ="submit" name="submit" class="formComission-Section-buttonSend">
                                <p>Send</p>
                            </button>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <section class="formComission-Section">
                                <div class="row">
                                    <div class="formComission-Section-category">
                                        <select name="type" class="selectCategory">
                                            <option hidden>Category</option>
                                            <option <?php if ($type == 1 ) echo 'selected'; value="1">Web site designer</option>
                                            <option <?php if ($type == 2 ) echo 'selected'; value="2">Programist</option>
                                            <option <?php if ($type == 3 ) echo 'selected'; value="3">graphic</option>
                                            <option <?php if ($type == 4 ) echo 'selected'; value="4">mobile aplication</option>
                                            <option <?php if ($type == 5 ) echo 'selected'; value="5">data base enginer</option>
                                        </select> 
                                    </div>
                                    <div class="formComission-Section-wybrane">
                                        <select class="selectedCategory" onchange="removeOptions(0)" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="formComission-Section-category">
                                        <select class="selectCategory">
                                            <option hidden>Mam dość</option>
                                            <option value="1">Maku</option>
                                            <option value="2">Kurwa</option>
                                            <option value="3">Wisisz</option>
                                            <option value="4">Mi</option>
                                            <option value="5">Piwo</option>
                                        </select>
                                    </div>
                                    <div class="formComission-Section-wybrane">
                                        <select class="selectedCategory" multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <div class="formComission-Section-information">
                                <div class="formComission-Section-date opt">
                                    <input type="date" name="date">
                                </div>
                                <div class="formComission-Section-prize opt">
                                    <input type="text" name="prize" placeholder="Prize">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <form  action="commisionadd.php" method="post">
                            <div class="formComission-Section-title">
                                <input type="text" name="title" placeholder="Title">
                            </div>
                            
                            <div class="formComission-Section-about">
                                <textarea name="description" placeholder="About comission" ></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
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