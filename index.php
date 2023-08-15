<!doctype html>
<html lang="en">
<head>
<title>Artefact | Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style/login.css"> 
<?php

$host = "localhost";
$user = "manny";
$password = "manny";
$database = "artefact";

$connection = new mysqli($host,$user,$password, $database);

// mysql_select_db($database,$connection);

?>
    
</head>

<body>

    <div class="container">
	  
      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username">
			<br/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        
        <div class="checkbox">
        <label><input type="checkbox" value="remember-me">Remember me</label>
        </div>
        
        <input class="btn btn-lg btn-primary btn-block" width="20px" id="submit" name="submit" value="Login" type="submit"/>
        <a class="btn btn-lg btn-primary btn-block" width="20px" href="register.php" >Register</a>
         
      </form>
      
	  <?php
		require_once("dbcontroller.php");
		if (isset($_POST['submit']))
		{
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];	

			// Create a new instance of DBController
			$db = new DBController();

			$select_user= "select count(user_id) as log,user_id,user_name,first_name,last_name,user_email,user_add,user_tp,user_nic,user_balance from tbl_user_detail where user_name = '$user_name' and password = '$password'";

			$result = $db->runQuery($select_user);

			$row = $result[0];

			if($row['log']==1)
			{
				session_start();
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['first_name'] = $row['first_name'];
				$_SESSION['last_name'] = $row['last_name'];
				$_SESSION['user_email'] = $row['user_email'];
				$_SESSION['user_add'] = $row['user_add'];
				$_SESSION['user_tp'] = $row['user_tp'];
				$_SESSION['user_nic'] = $row['user_nic'];
				$_SESSION['user_balance'] = $row['user_balance'];

				echo '<BR>You are logged in';
				header('Location: dashboard.php');	
			}
			else
			{
				echo '<BR>Incorrect Combination';
			}
		}
	?>

		 
    
    </div>
   
</body>
</html>
