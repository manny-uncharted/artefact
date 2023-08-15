<!doctype html>
<html lang="en">
<head>
<?php
include('nav.php');
include('sys/db_conn.php');
include('sys/dash_img.php'); 
?>

<title>Artefact | Dashboard</title>
    
</head>

<body>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Dashboard</h1>

    <div class="row placeholders">
        <?php
        $query = "SELECT * FROM tbl_movies ORDER BY RAND() LIMIT 4";
        $result = $connection->query($query);

        while ($row = $result->fetch_assoc()) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $movie_cover = $row['movie_cover'];

            echo '<div class="col-xs-6 col-sm-3">';
            echo '<a href="movie_description.php?id=' . $movie_id . '">';
            echo '<img class="img-responsive" src="' . $movie_cover . '" alt="' . $movie_title . '" />';
            echo '</a>';
            echo '<h4>' . $movie_title . '</h4>';
            echo '<span class="text-muted">Test</span>';
            echo '</div>';
        }
        ?>
    </div>

    <h2 class="sub-header">Hot Pick</h2>
    <div class="table-responsive">
        <?php
        $query = "SELECT * FROM tbl_movies ORDER BY RAND() LIMIT 10";
        $result = $connection->query($query);

        echo '<table class="table table-hover">';
        echo '<tr><td>Movie ID</td><td>Title</td><td>Year</td><td>Rating</td><td>Action</td></tr>';
        while ($row = $result->fetch_assoc()) {
            $movie_id = $row['movie_id'];
            $movie_title = $row['movie_title'];
            $movie_year = $row['movie_year'];
            $movie_rating = $row['movie_rating'];

            echo '<tr>';
            echo '<td>' . $movie_id . '</td>';
            echo '<td>' . $movie_title . '</td>';
            echo '<td>' . $movie_year . '</td>';
            echo '<td>' . $movie_rating . '</td>';
            echo '<td><a href="movie_description.php?id=' . $movie_id . '">Lend</a></td>';
            echo '</tr>';
        }

        echo '</table>';
        ?>
    </div>
</div>

</body>
</html>
