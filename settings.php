<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Artefact | Settings</title>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakila-movie-db";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

include('nav.php');

$deleteuser = $_SESSION['username'];

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM staff WHERE username = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $deleteuser);
    session_destroy();

    header('Location: index.php');	

    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


</head>

<body>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">Settings</h1>


<form method="post">
    <button type="submit" name="delete">Deactivate Account</button>
</form>

</div>

</body>
</html>
