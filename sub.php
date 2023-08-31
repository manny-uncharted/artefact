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
$database = "sakila-movie-db";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $store_id = 1;
    $address_id = 3;

    // Check if the username already exists
    $existingUserQuery = "SELECT * FROM staff WHERE username = ?";
    $stmt = $connection->prepare($existingUserQuery);
    $stmt->bind_param("s", $user_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><strong> Error! Username already exists.</strong></div>';
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        // Insert new user details
        $insertQuery = "INSERT INTO staff (username, password, first_name, last_name, email, store_id, address_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insertQuery);
        $stmt->bind_param("sssssii", $user_name, $password, $first_name, $last_name, $user_email, $store_id, $address_id);
        
        if ($stmt->execute()) {
            session_start();
            $_SESSION['username'] = $user_name;
            // Store only necessary data in the session
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['useremail'] = $user_email;
            $_SESSION['store_id'] = $store_id;

            echo 'Data inserted';
            header('Location: dashboard.php');
            exit;
        } else {
            // echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all inputs.</strong></div>';
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }
}

$connection->close();
?>


