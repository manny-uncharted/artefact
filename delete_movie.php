<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database = "sakila-movie-db";

$connection = new mysqli($hostname, $username, $password, $database);


$movie_id = $_GET['id'];
$delete_query = "DELETE FROM film WHERE film_id = ?";
$stmt = $connection->prepare($delete_query);
$stmt->bind_param("s", $movie_id);

if ($stmt->execute()) {
    echo '<div style="margin-left: 100px;">Data deleted successfully</div>';
} else {
    echo '<div style="margin-left: 100px;">Error deleting record: ' . $stmt->error . '</div>';
}

$stmt->close();
header('Location: dashboard.php');

?>
