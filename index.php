<?php
// include("inc/data.php");
include("inc/db.php");
include("inc/functions.php");

$pageTitle = "";
include("inc/header.php");

$where = where($_GET['title'],$_GET['actor']);
$sort = sortQuery($_GET['sort']);

?>

  <body>

  	<div class="container">

      <div class="row">
        <h1 class="text-center">Movies Viewer</h1>
        <p class="lead text-center">List of your favorite movies below.</p>

		<div class="form-group search-box">
			<div class="col-sm-3">
				<select class="form-control" id="select">
					<option disabled>-- Select search criteria --</option>
					<option value="title">By title</option>
					<option value="actor">By actor</option>
				</select>
			</div>
			<label for="search" class="col-sm-3 control-label text-right">Search criteria</label>
			<div class="col-sm-6">
			    <input type="text" class="form-control" id="search" placeholder="Insert search criteria">
			</div>
		</div>
	  </div>
	
	  <hr>

	  <div class="row">
        <table class="table table-hover table-bordered">
		  <thead>
			  <tr>
			  	<th>№ </th>
			  	<th><a href="index.php?sort=<?php if(!isset($_GET["sort"])||$_GET["sort"]=="ASC"){
			  											echo "DESC";
			  											$sortDirection = "up";
			  										}else if($_GET["sort"]=="DESC"){
			  											echo "ASC";
			  											$sortDirection = "down";
			  										}?>">Title&nbsp;<span class="arrow <?php echo $sortDirection; ?>"></span>
			  										</a></th>
			  	<th>Release year</th>
			  	<th>Format</th>
			  	<th>Cast</th>
			  	<th>Options</th>
			  </tr>
		  </thead>
		  <tbody>
			  <?php
			  	echo get_table_rows($db,$where,$sort);
			  ?>
			  <tr class="row-add-item">
			  	<td></td>
			  	<td><a href="add.php">Add new Item</a></td>
			  	<td></td>
			  	<td></td>
			  	<td></td>
			  	<td></td>
			  </tr>
		  </tbody>
		</table>
      </div>

    </div><!-- /.container -->
    

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>