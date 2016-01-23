<?php
include("inc/data.php");
include("inc/functions.php");


if(isset($_GET['id'])){
	$id = $_GET['id'];
	$item = $movies[$id];
} else {
	header("location:index.php");
	exit;
}

$pageTitle = " | " . $item["title"];

include("inc/header.php");
?>

  <body>

  	<div class="container">

      <div class="row">
        <h1 class="text-center">Movie Detail</h1>
        <p class="lead text-center">Detail information about movie below.</p>
        <div class="col-md-4 col-sm-6"><img src="img/300x300.gif" alt="Movie poster"></div>
        <div class="col-md-8 col-sm-6">
        	<table class="table table-hover">
        		<tr>
        			<td>Title</td>
        			<td><?php echo $item["title"]; ?></td>
        		</tr>
        		<tr>
        			<td>Release year</td>
        			<td><?php echo $item["year"]; ?></td>
        		</tr>
        		<tr>
        			<td>Format</td>
        			<td><?php echo $item["format"]; ?></td>
        		</tr>
        		<tr>
        			<td>Cast</td>
        			<td><?php echo implode(", ", $item["cast"]); ?></td>
        		</tr>
        		<tr class="row-detete-item">
        			<td></td>
        			<td><a href="delete.php?id=<?php echo $id; ?>">Delete this movie from list</a></td>
        		</tr>
        	</table>
        </div>
      	<hr>
		<a href="index.php" class="btn btn-danger back" role="button">Go back to the full list</a>
      </div>

    </div><!-- /.container -->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </body>
</html>