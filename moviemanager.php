<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Artefact | Movie Manager</title>

<?php
include('nav.php');

$hostname = "localhost";
$username = "root";
$password = "";
$database = "artefact";

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['submit'])) {
    $movie_title = $_POST['movie_title'];
    $movie_year = $_POST['movie_year'];
    $movie_rating = $_POST['movie_rating'];
    $movie_type = $_POST['movie_type'];
    $movie_genre = $_POST['movie_genre'];
    $movie_cover = $_POST['movie_cover'];
    $movie_detail = $_POST['movie_detail'];
    $movie_value = $_POST['movie_value'];

    $insert_details = "INSERT INTO tbl_movies (movie_title, movie_year, movie_rating, movie_type, movie_genre, movie_cover, movie_detail, movie_value) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $connection->prepare($insert_details);
    $stmt->bind_param("ssssssss", $movie_title, $movie_year, $movie_rating, $movie_type, $movie_genre, $movie_cover, $movie_detail, $movie_value);
    $stmt->execute();

    $admin = "lahiru";
    if ($_SESSION['user_name'] == $admin) {
        echo '<div style="margin-left:100px;">Data inserted</div>';
    } else {
        echo '<div style="margin-left:100px;">Error! Please check all inputs.</div>';
    }

    $stmt->close();
}

$connection->close();
?>


</head>

<body>

<div class="col-sm-9 col-md-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">Movie Manager</h1>
<h3 class="page-header">Add Movies</h3>


		<form role="form" action="" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"> </span>Required Field</strong></div>
                               
                <div class="form-group">
                    <label>Movie Title</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="movie_title"  id="movie_title" placeholder="" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>  
                    </div>
                </div>

                <div class="form-group">
                    <label>Movie Year</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="movie_year" id="movie_year" placeholder="" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Movie Rating</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="movie_rating" id="movie_rating" placeholder="Enter First Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 
                 <div class="form-group">
                    <label>Movie Type</label>
                    <div class="input-group">
                            <select id="movie_type" name="movie_type" class="form-control">
                            	<option value="" >Select</option>
                                <option value="bray" >Blu-Ray</option>
                                <option value="dvd">DVD</option>
                                <option value="cd">CD</option>
                            </select> 
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Movie Genere</label>
                    <div class="input-group">
                            <select id="movie_genere" name="movie_genere" class="form-control">
                                    <option value="">Select</option>
                                    <option value="action">Action</option>
                                    <option value="adventure">Adventure</option>
                                    <option value="animation">Animation</option>
                                    <option value="comedy">Comedy</option>
                                    <option value="horror">Horror</option>
                                    <option value="scfi">Sci-Fi</option>
                            </select>   
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Movie Cover</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="movie_cover" name="movie_cover" placeholder="" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Movie Deatails</label>
                    <div class="input-group">
                        <input type="textbox" class="form-control" id="movie_detail" name="movie_detail" placeholder="Enter Contact Number"  required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Movie Value</label>
                    <div class="input-group">
                        <input type="textbox" class="form-control" id="movie_value" name="movie_value" placeholder="Enter Contact Number"  required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right" >
                <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-info pull-right" >
                </div>
                
            </div>
        </form>






</div>

</body>
</html>
