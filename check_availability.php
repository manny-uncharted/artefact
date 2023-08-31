<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if (!empty($_POST["user_name"])) {
  $query = "SELECT count(*) FROM staff WHERE username=?";
  $stmt = $db_handle->prepareQuery($query);
  $stmt->bind_param("s", $_POST["user_name"]);
  $stmt->execute();
  $stmt->bind_result($user_count);
  $stmt->fetch();
  $stmt->close();

  if ($user_count > 0) {
    echo "<span class='status-not-available'> Username Not Available.</span>";
  } else {
    echo "<span class='status-available'> Username Available.</span>";
  }
}
?>





