<?php

    session_start();
	
	
    echo " Thanks for using our site!";
       echo '<input class="zaloguj"  href="login.html"  type="button" name="submit" value="Log In">';

    session_unset();

?>