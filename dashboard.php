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
            <div class="col-xs-6 col-sm-3">
              <img class="img-responsive" src="<?php echo $path . $img1 ?>" alt="" />
              <h4>Label</h4>
              <span class="text-muted">Test</span>
            </div>
            <div class="col-xs-6 col-sm-3">
              <img class="img-responsive" src="<?php echo $path . $img2 ?>" alt="" />
              <h4>Label</h4>
              <span class="text-muted">Test</span>
            </div>
            <div class="col-xs-6 col-sm-3">
              <img class="img-responsive" src="<?php echo $path . $img3 ?>" alt="" />
              <h4>Label</h4>
              <span class="text-muted">Test</span>
            </div>
            <div class="col-xs-6 col-sm-3">
              <img class="img-responsive" src="<?php echo $path . $img4 ?>" alt="" />
              <h4>Label</h4>
              <span class="text-muted">Test</span>
            </div>
          </div>

          <h2 class="sub-header">Hot Pick </h2>
          <div class="table-responsive">
          
          <?php
		  
          	$query = "SELECT * FROM tbl_movies order by rand() limit 0,10"; 
			$result = mysql_query($query);

			echo '<table class="table table-hover">'; 
			echo '<tr><td>Movie ID</td> <td>Title</td> <td>Year</td>  <td>Rating</td> <td>Action</td></tr>'; 
			while($row = mysql_fetch_array($result)){ 
			
			 if (count($result) == "2") {
					break;
				}
			
			echo "<tr><td>" . $row['movie_id'] . "</td><td>" . $row['movie_title'] . "</td> <td>" . $row['movie_year'] . "</td> <td>" . $row['movie_rating'] . "</td> <td>Lend</td> </tr>";
			}
			
			echo "</table>";
          
		  ?>
          
          </div>
        
        </div>
</body>
</html>
