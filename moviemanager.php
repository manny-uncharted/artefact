<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Artefact | Update Movie</title>

<?php
include('nav.php');

$hostname = "localhost";
$username = "root";
$password = "";
$database = "sakila-movie-db";

$connection = new mysqli($hostname, $username, $password, $database);

$movie_id = $_GET['id'];
$select_query = "SELECT * FROM film WHERE film_id = ?";
$stmt = $connection->prepare($select_query);
$stmt->bind_param("s", $movie_id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();


if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $movie_title = $_POST['title'];
    $movie_desc = $_POST['description'];
    $movie_year = $_POST['release_year'];
    $movie_language = $_POST['language_id'];
    $movie_orig_language = $_POST['original_language_id'];
    $movie_rental_duration = $_POST['rental_duration'];
    $movie_rental_rate = $_POST['rental_rate'];
    $movie_length = $_POST['length'];
    $movie_replacement_cost = $_POST['replacement_cost'];
    $movie_rating = $_POST['rating'];
    $movie_special_features = $_POST['special_features'];
    $movie_last_update = $_POST['last_update'];


    $update_query = "UPDATE film SET  title = ?, description = ?, release_year = ?, language_id = ?, original_language_id = ?, rental_duration = ?, rental_rate = ?, length = ?, replacement_cost = ?, rating =?, special_features = ?, last_update =?, WHERE id = ?";
    $stmt = $connection->prepare($update_query);
    $stmt->bind_param("sssssssss", $movie_title, $movie_desc, $movie_year, $movie_language, $movie_orig_language, $movie_rental_duration, $movie_rental_duration, $movie_rental_rate, $movie_length, $movie_replacement_cost, $movie_rating, $movie_special_features, $movie_last_update, $movie_id);

    if ($stmt->execute()) {
        echo '<div style="margin-left: 100px;">Data updated</div>';
    } else {
        echo '<div style="margin-left: 100px;">Error executing statement: ' . $stmt->error . '</div>';
    }

    $stmt->close();
}



$connection->close();
?>


</head>

<body>

    <div class="col-sm-9 col-md-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Movie Manager</h1>
    <h3 class="page-header">Update Movies</h3>


    <form role="form" action="" method="post">
        <div class="col-lg-6">
            <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"> </span>Required Field</strong></div>

            <div class="form-group">
                <label>Film Title</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $movie['title']; ?>" required>
                    <span class="input-group-addon"></span>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="description" id="description" value="<?php echo $movie['description']; ?>" required>
                    <span class="input-group-addon"></span>
                </div>
            </div>

            <div class="form-group">
                <label>Release Year</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="release_year" id="release_year" value="<?php echo $movie['release_year']; ?>" required>
                    <span class="input-group-addon"></span>
                </div>
            </div>

            <!-- Add similar form groups for the rest of the fields -->

            <div class="form-group">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                <input type="reset" name="reset" id="reset" value="Reset" class="btn btn-info pull-right">
                <a href="delete_movie.php?id=<?php echo $movie['film_id']; ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </form>







</div>

</body>
</html>
