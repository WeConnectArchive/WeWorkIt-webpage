<?php
error_reporting(E_ALL);
include '../dbcon.php';

$desc = $_POST['desc'];
pg_query($dbconn4, "INSERT INTO commision (description) values ('$desc')");
var_dump($desc);
?>