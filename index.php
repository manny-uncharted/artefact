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
        // Database connection details
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "sakila-movie-db";

        // Create a new mysqli instance
        $connection = new mysqli($host, $user, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
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
            if (isset($_POST['submit'])) {
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];

                // Prepare the SQL query
                $stmt = $connection->prepare("SELECT * FROM staff WHERE username = ?");

                if (!$stmt) {
                    echo "Prepare failed: (" . $connection->errno . ") " . $connection->error;
                }

                // Bind the username to the query
                $stmt->bind_param("s", $user_name);

                // Execute the query
                if ($stmt->execute()) {
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $hashed_password = password_needs_rehash($password, PASSWORD_DEFAULT);

                        // Verify the password
                        if(password_verify($hashed_password, $row['password'])) {
                            // Set session variables
                            $_SESSION['staff_id'] = $row['staff_id']; 
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['first_name'] = $row['first_name'];
                            $_SESSION['last_name'] = $row['last_name'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['address_id'] = $row['address_id'];
                            $_SESSION['store_id'] = $row['store_id'];
                            $_SESSION['active'] = $row['active'];
                            // ... set other session variables ...

                            echo '<br>You are logged in';
                            header('Location: dashboard.php');
                        } else {
                            echo '<br>Incorrect Combination';
                        }
                    } else {
                        echo '<br>Incorrect Combination';
                    }
                } else {
                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                }
            }
        ?>








		 
    
    </div>
   
</body>
</html>
