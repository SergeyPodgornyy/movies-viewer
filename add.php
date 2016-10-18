<?php
$pageTitle = " | Add new item";
include("inc/header.php");
?>

<body>
<div class="container">
    <div class="row">
        <h1 class="text-center">Add new item to Movies Viewer</h1>
        <p class="lead text-center">Insert below infomation about year favorute movie.</p>

        <form action="insert.php" class="form-horizontal" method="POST">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Movie title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Insert movie title" required>
                </div>
            </div>
            <div class="form-group">
                <label for="year" class="col-sm-2 control-label">Release year</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="year" name="year" placeholder="Insert release year" required>
                </div>
            </div>
            <div class="form-group">
                <label for="format" class="col-sm-2 control-label">Movie format</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="format" name="format" placeholder="Insert movie format" required>
                </div>
            </div>
            <div class="form-group">
                <label for="cast" class="col-sm-2 control-label">Cast</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="cast" name="cast" rows="4"  placeholder="Insert main actors starred in the film" required></textarea>
                    <p class="hint">* Comma separated please</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Add new movie</button>
                </div>
            </div>
        </form>
        <hr><h3 class="text-center">OR</h3>
        <form enctype="multipart/form-data" action="file_handler.php" method="POST">
            <div class="form-group">
                <label for="file" class="col-sm-2 control-label text-right">Upload XML file</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" style="margin-top:20px">Add new movie</button>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
<a href="index.php" class="btn btn-danger back" role="button">Go back to the full list</a>
</body>
</html>
