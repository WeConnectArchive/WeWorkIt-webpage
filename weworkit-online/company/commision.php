<?php
session_start();
error_reporting(E_ALL);
include '../dbcon.php';
$url= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$przycisk = $_POST['submit'];
$all= pg_query($dbconn4,"SELECT id, mail, companyname, description
FROM commision
WHERE url='$url'");

if($row = pg_fetch_array($all)) { echo "<br>";

    printf (" Mail: %s  CompanyName: %s description: %s " , $row["mail"], $row["companyname"], $row["description"]);
    echo "<br>";
}
else{
    header('Location: http://www.weworkit-online.com/user/commisionshow.php');
}
if(isset($_SESSION['email']) && $przycisk){
$umail = $_SESSION['email'];
$uname = $_SESSION['user'];
$cname = $row["companyname"];
$cmail = $row["mail"];

pg_query($dbconn4, "INSERT INTO connection (uname, umail, cname, cmail) VALUES ('$uname', '$umail', '$cname', '$cname'");
}
?>
<html>
<body>
<button type='submit' action='commision.php' method='POST' name="submit" value="submit">
</body>
</html>