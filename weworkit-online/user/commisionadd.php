<?php
session_start();
error_reporting(E_ALL);
include '../dbcon.php';
$email = $_SESSION['companyemail'];
$id    = $_SESSION['id'];
$companyname = $_SESSION['companyname'];
var_dump($email, $companyname, $id);
if (isset($_POST['submit'])) {
    //0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
    $title = $_POST['title'];
    $description = $_POST['description'];
    $prize = $_POST['prize'];
    $date = $_POST['date'];
    var_dump($title);
    var_dump($description);
    var_dump($prize);
    var_dump($date);
    $rand = rand(0, 99999);
    $url = "http://www.weworkit-online.com/company/commision.php/url=$rand";
    //0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
    pg_query($dbconn4, "INSERT INTO commision (IDs, mail, companyname, url) values ('$id', '$email', '$companyname', '$url')");
    pg_query($dbconn4, "UPDATE commision SET title = '$title' WHERE url = '$url'");
    pg_query($dbconn4, "UPDATE commision SET description = '$description' WHERE url = '$url'");
    pg_query($dbconn4, "UPDATE commision SET prize = '$prize' WHERE url = '$url'");
    pg_query($dbconn4, "UPDATE commision SET date = '$date' WHERE url = '$url'");
    //0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000
    $type= $_POST['type'];
    if ($type == 2 ) echo 'programist';
    

}              



?>