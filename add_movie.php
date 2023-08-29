<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artefact | Add Movies</title>


        <?php 
        include('nav.php');


        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "artefact";

        $connection = new mysqli($hostname, $username, $password, $database);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $movie_title = $_POST['title'];
            $movie_desc = $_POST['description'];
            // Fetch the rest of the fields in a similar manner

            $insert_query = "INSERT INTO film (title, description, ...) VALUES (?, ?, ...)";
            $stmt = $connection->prepare($insert_query);
            $stmt->bind_param("ss", $movie_title, $movie_desc);

            if ($stmt->execute()) {
                echo '<div style="margin-left: 100px;">Data inserted successfully</div>';
            } else {
                echo '<div style="margin-left: 100px;">Error inserting data: ' . $stmt->error . '</div>';
            }

            $stmt->close();
        }



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
                            <input type="text" class="form-control" name="title" id="title" required>
                            <span class="input-group-addon"></span>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="description" id="description" required>
                            <span class="input-group-addon"></span>
                        </div>
                    </div>

                    <!-- Add more form groups for the rest of the fields -->

                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                    </div>
                </div>
            </form>

        </div>

    </body>
</html>

