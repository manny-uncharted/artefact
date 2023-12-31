<?php
include('sys/db_conn.php');
include('nav.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            max-width: 80%;
            overflow-x: hidden;
        }

        @media (min-width: 768px) {
            body {
                padding-left: 500px;
                padding-top: 100px;
            }
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 5px;
        }

        img {
            max-width: 300px;
            height: auto;
            margin-bottom: 10px;
        }

        .movie-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .movie-details h1 {
            margin-top: 0;
        }

        .movie-details p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
// Check if the movie ID is provided in the URL
if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Fetch the movie details from the database
    $query = "SELECT * FROM film WHERE film_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the movie exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the movie details
        echo "<div class='movie-details'>";
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<p><strong>Year Released:</strong> " . $row['release_year'] . "</p>";
        echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
        echo "<p><strong>Rating:</strong> " . $row['rating'] . "</p>";
        echo "<p><strong>Release Year:</strong> " . $row['release_year'] . "</p>";
        echo "<img src='" . $row['language_id'] . "' alt='" . $row['title'] . "'>";
        echo "<p><strong>Language:</strong> " . $row['language_id'] . "</p>";
        echo "<p><strong>Rental Duration:</strong> " . $row['rental_duration'] . "</p>";
        echo "<p><strong>Movie Length:</strong> " . $row['length'] . "</p>";
        echo "<p><strong>Replacement Cost:</strong> " . $row['replacement_cost'] . "</p>";
        echo "<p><strong>Special Features:</strong> " . $row['special_features'] . "</p>";
        echo "<p><strong> Last Update:</strong> " . $row['last_update'] . "</p>";
        // echo "<p><strong>Detail:</strong> " . $row['movie_detail'] . "</p>";
        echo "<p><strong>Rental Rate:</strong> " . $row['rental_rate'] . "</p>";
        echo "</div>";
    } else {
        echo "<p>Movie not found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid movie ID.</p>";
}

$connection->close();
?>
</body>
</html>
