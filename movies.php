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
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-perpage">Rows per page:</label>
                            <select id="pref-perpage" class="form-control">
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option selected="selected" value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="1000">1000</option>
                            </select>                                
                        </div> 
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-orderby">Category:</label>
                            <select id="pref-orderby" name="genere" class="form-control">
                            	<option value="">Select</option>
                                <option value="action">Action</option>
                                <option value="adventure">Adventure</option>
                                <option value="animation">Animation</option>
                                <option value="comedy">Comedy</option>
                                <option value="horror">Horror</option>
                                <option value="scfi">Sci-Fi</option>
                            </select>                                
                        </div> 
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-orderby">Year:</label>
                            <select id="pref-orderby" class="form-control">
                                <option value="2">1992</option>
                                <option value="3">1993</option>
                                <option value="4">1994</option>
                                <option value="5">1995</option>
                                <option value="6">1996</option>
                                <option value="7">1997</option>
                                <option value="8">1998</option>
                                <option value="9">1999</option>
                                <option value="10">2000</option>
                                <option value="15">2001</option>
                                <option value="20">2002</option>
                                <option value="30">2003</option>
                                <option value="40">2004</option>
                                <option value="50">2005</option>
                                <option value="100">2006</option>
                                <option value="200">2007</option>
                                <option value="300">2008</option>
                                <option value="400">2009</option>
                                <option value="500">2010</option>
                                <option value="1000">2011</option>
                                <option value="15">2011</option>
                                <option value="20">2012</option>
                                <option value="30">2013</option>
                                <option value="40">2014</option>
                                <option value="50">2015</option>
                                <option value="100">2016</option>
                            </select>                                
                        </div>
                        <div class="form-group">
                            <label class="filter-col" style="margin-right:0;" for="pref-orderby">Type:</label>
                            <select id="pref-orderby" name="type" class="form-control">
                            	<option value="" >Select</option>
                                <option value="bray" >Blu-Ray</option>
                                <option value="dvd">DVD</option>
                                <option value="cd">CD</option>
                             </select>                                
                        </div> 
                        
                        <div class="form-group">    
                            <input type="text" name="search" class="form-control" value="" placeholder="Search...">
            				<input class="btn " type="submit" value="Search" name="submit" />
                            
                        </div>
                    </form>
                </div>
            
        </div>    
        
	</div>
</div>		  

 <div class="table-responsive">
          
    <?php
    $servername = "localhost";
    $database = "artefact";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $type = $_POST['type'];
        $genre = $_POST['genere'];
    }

    if (!empty($_POST['search'])) {
        $term = mysqli_real_escape_string($conn, $_POST['search']);

        $sql = "SELECT * FROM tbl_movies WHERE movie_title LIKE ? AND movie_type LIKE ? AND movie_genere LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);

        // Assign the values to separate variables
        $likeTerm = "%" . $term . "%";
        $likeType = "%" . $type . "%";
        $likeGenre = "%" . $genre . "%";

        // Pass the variables as references to mysqli_stmt_bind_param()
        mysqli_stmt_bind_param($stmt, "sss", $likeTerm, $likeType, $likeGenre);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        echo '<h3>Search results for "' . $term . '"</h3>';
        echo '<table class="table table-hover">';
        echo '<tr><td>Movie ID</td> <td>Title</td> <td>Year</td> <td>Rating</td> <td>Type</td> <td>Action</td></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['movie_id'] . "</td><td>" . $row['movie_title'] . "</td> <td>" . $row['movie_year'] . "</td> <td>" . $row['movie_rating'] . "</td> <td>" . $row['movie_type'] . "</td> <td>Lend</td> </tr>";
        }

        echo "</table>";
    }

    mysqli_close($conn);
    ?>


          </div>


</div>

</body>
</html>
