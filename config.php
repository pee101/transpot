<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$dbname="transpot";
$charset="utf8";
$connect = mysqli_connect($db_server, $db_user, $db_pass, $dbname) or die ("ติดต่อ Host ไม่ได้!!");
if(!$connect->set_charset($charset)) {
   printf("Error loading character set utf8: %sn", $connect->error);
}

?>
