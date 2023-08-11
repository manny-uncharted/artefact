<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_dvd_sys";

$connection = mysql_connect($hostname,$username,$password);

mysql_select_db($database,$connection);

?>