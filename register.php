<?php
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$database = "";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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

    $sql = "INSERT INTO users (user_name, password, first_name, last_name, user_email, user_add, user_tp, user_nic) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssssssss", $user_name, $password, $first_name, $last_name, $user_email, $user_add, $user_tp, $user_nic);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    echo "User registered successfully!";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Artefact | Register</title>
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

<style>
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
.btn{margin-left:5px;margin-bottom:5px;}
</style>	



</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Registration form</h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
       
        <form role="form" action="sub.php" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"> </span>Required Field</strong></div>
                
				<script>
					function checkAvailability() {
						$("#loaderIcon").show();
						jQuery.ajax({
						url: "check_availability.php",
						data:'user_name='+$("#user_name").val(),
						type: "POST",
						success:function(data){
							$("#user-availability-status").html(data);
								},
						error:function (){}
								});
					}
				</script>
                
                <div class="form-group">
                    <label>Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_name"  id="user_name" placeholder="Enter Username" maxlength="15" onBlur="checkAvailability()">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>  
                    </div>
                    <span id="user-availability-status"></span>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>First Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="first_name" id="first_name" onBlur="checkAvailability()" placeholder="Enter First Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 
                 <div class="form-group">
                    <label>Last Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Address</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="user_add" name="user_add" placeholder="Enter Address" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Contact Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="user_tp" name="user_tp" placeholder="Enter Contact Number"  required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>NIN Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="user_nic" name="user_nic" placeholder="Enter NIC Number" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right" >
                <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-info pull-right" >
                </div>
                
            </div>
        </form>
        
<!--    <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div>-->
</div>
</div>
</div>

</body>
</html>
