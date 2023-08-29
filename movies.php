<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artefact | Movies</title>
        <?php
        include('nav.php');
        include('sys/db_conn.php');
        ?>
        <style>
            .container{
                margin-top:30px;
            }
            .filter-col{
                padding-left:10px;
                padding-right:10px;
            }
        </style>
    </head>
    <body>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Movies</h1>
        <div class="container">
        <div class="row">
            <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-inline" role="form" method="post">
                <!-- existing filters go here -->
                <div class="form-group">
                    <label class="filter-col" style="margin-right:0;" for="pref-orderby">Category:</label>
                    <select id="pref-orderby" name="category" class="form-control">
                    <option value="">Select</option>
                    <!-- options could be generated from database -->
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Horror">Horror</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="search" class="form-control" value="" placeholder="Search...">
                    <input class="btn" type="submit" value="Search" name="submit" />
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>

        <div class="table-responsive">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "artefact");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['submit'])) {
            $term = $_POST['search'] ?? '';
            $category = $_POST['category'] ?? '';

            $sql = "SELECT film.*
                    FROM film
                    JOIN film_category ON film.film_id = film_category.film_id
                    JOIN category ON film_category.category_id = category.category_id
                    WHERE film.title LIKE ? AND category.name LIKE ?";

            $stmt = mysqli_prepare($conn, $sql);

            $likeTerm = "%" . $term . "%";
            $likeCategory = "%" . $category . "%";

            mysqli_stmt_bind_param($stmt, "ss", $likeTerm, $likeCategory);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            echo '<h3>Search results for "' . $term . '" in category "' . $category . '"</h3>';
            echo '<table class="table table-hover">';
            echo '<tr><td>Film ID</td> <td>Title</td> <td>Year</td> <td>Rating</td> <td>Category</td> <td>Action</td></tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['film_id'] . "</td><td>" . $row['title'] . "</td> <td>" . $row['release_year'] . "</td> <td>" . $row['rating'] . "</td> <td>" . $category . "</td> <td><a href=\"movie_description.php?id=" . $row['film_id'] . "\">View</a></td></tr>";
            }
            echo "</table>";
        }
        mysqli_close($conn);
        ?>
        </div>
    </div>
    </body>
</html>
