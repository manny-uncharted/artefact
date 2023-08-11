<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


if(!empty($_POST["user_name"])) {
  $result = mysql_query("SELECT count(*) FROM tbl_user_detail WHERE user_name='" . $_POST["user_name"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}

?>