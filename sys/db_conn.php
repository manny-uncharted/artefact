<?php

$hostname = "localhost";
$username = "manny";
$password = "";
$database = "artefact";

$connection = mysql_connect($hostname,$username,$password);

mysql_select_db($database,$connection);

?>