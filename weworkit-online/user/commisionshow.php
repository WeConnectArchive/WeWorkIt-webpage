<?php
session_start();
error_reporting(E_ALL);
include '../dbcon.php';

/*$adr = ($_GET["url"]);
if(isset($adr)){
    header "http://www.weworkit-online.com/company/commision.php/url=$adr"

*/
?>


<html>
<body>
<h1> All commisions</h1>
<?php  $all= pg_query($dbconn4,"SELECT id, mail, companyname, description,url FROM commision");
while ($row = pg_fetch_array($all)) { echo "<br>";

    printf (" Mail: %s  CompanyName: %s description: %s url: %s" , $row["mail"], $row["companyname"], $row["description"], $row["url"]);
    echo "<br>";

}


?>
<h2> Your commisions</h2>
<body>
</html>