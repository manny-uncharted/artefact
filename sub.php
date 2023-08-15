<head>
<meta charset="utf-8" />
    <title>Artefact | Register User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

</head>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "artefact";

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $user_add = $_POST['user_add'];
    $user_tp = $_POST['user_tp'];
    $user_nic = $_POST['user_nic'];
    $user_balance = $_POST['user_balance'];

    $insert_details = "INSERT INTO tbl_user_detail (user_name, password, first_name, last_name, user_email, user_add, user_tp, user_nic, user_balance) VALUES ('$user_name', '$password', '$first_name', '$last_name', '$user_email', '$user_add', '$user_tp', '$user_nic', '500')";

    $sql = "SELECT * FROM tbl_user_detail WHERE user_name = '$user_name'";
    $result = $connection->query($sql);
    $numrows = $result->num_rows;

    if ($connection->query($insert_details) === TRUE && $numrows == 0) {
        session_start();
        $_SESSION['user_name'] = $user_name;
        $_SESSION['password'] = $password;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_add'] = $user_add;
        $_SESSION['user_tp'] = $user_tp;
        $_SESSION['user_nic'] = $user_nic;
        $_SESSION['user_balance'] = $user_balance;

        echo 'Data inserted';
        header('Location: dashboard.php');
        exit;
    } elseif ($numrows > 0) {
        echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><strong> Error! Username already exists.</strong></div>';
    } else {
        echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all inputs.</strong></div>';
    }
}

$connection->close();
?>
