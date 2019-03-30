<?
session_start();
error_reporting(E_ALL);
include '../dbcon.php';
$email = $_SESSION['companyemail'];
$id    = $_SESSION['id'];
$companyname = $_SESSION['companyname'];
var_dump($email, $companyname);
$type= $_POST['type']; 
if (isset($_POST['submit'])) {
            include 'desc.php';
            var_dump($type);
                /*echo "przycisk";
                $desc = $_POST['desc'];
                $rand = rand(0, 99999);
                $url = "http://www.weworkit-online.com/company/commision.php/url=$rand";
                pg_query($dbconn4, "INSERT INTO commision (IDs, mail, companyname, description, url) values ('$id', '$email', '$companyname', '$desc', '$url')");
                var_dump($desc);
                if (isset($_POST['languagephp'])) {
                                $ch = pg_query($dbconn4, "UPDATE commision SET phplang = '1' WHERE description = '$desc' ");
                }else{pg_query($dbconn4, "UPDATE commision SET phplang = '0' WHERE description = '$desc' ");}
                if (isset($_POST['languagehtml'])) {
                                $ch = pg_query($dbconn4, "UPDATE commision SET htmllang = '1' WHERE description = '$desc' ");
                }else{pg_query($dbconn4, "UPDATE commision SET htmllang = '0' WHERE description = '$desc' ");}
                if (isset($_POST['1'])) {
                    $ch = pg_query($dbconn4, "UPDATE commision SET websitedesigner = '1' WHERE description = '$desc' ");
    }else{pg_query($dbconn4, "UPDATE commision SET websitedesigner = '0' WHERE description = '$desc' ");}
                if (isset($_POST['2'])) {
                    $ch = pg_query($dbconn4, "UPDATE commision SET programist = '1' WHERE description = '$desc' ");
    }else{pg_query($dbconn4, "UPDATE commision SET programist = '0' WHERE description = '$desc' ");}
    if (isset($_POST['3'])) {
        $ch = pg_query($dbconn4, "UPDATE commision SET graphic = '1' WHERE description = '$desc' ");
}else{pg_query($dbconn4, "UPDATE commision SET graphic = '0' WHERE description = '$desc' ");}
if (isset($_POST['4'])) {
    $ch = pg_query($dbconn4, "UPDATE commision SET mobileaplication = '1' WHERE description = '$desc' ");
}else{pg_query($dbconn4, "UPDATE commision SET mobileaplication = '0' WHERE description = '$desc' ");}
if (isset($_POST['5'])) {
    $ch = pg_query($dbconn4, "UPDATE commision SET databaseenginer = '1' WHERE description = '$desc' ");
}else{pg_query($dbconn4, "UPDATE commision SET databaseenginer = '0' WHERE description = '$desc' ");} */
}
?>