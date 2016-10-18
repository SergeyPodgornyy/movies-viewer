<?php
// require_once("inc/data.php");
require_once("inc/db.php");
require_once("inc/functions.php");

$pageTitle = "";
include("inc/header.php");

if (isset($_GET['title'])) {
    $where = where($_GET['title'], null);
} else if (isset($_GET['actor'])){
    $where = where(null, $_GET['actor']);
} else {
    $where = "";
}

$sort = isset($_GET['sort']) ? sortQuery($_GET['sort']) : "";

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
                        <option value="actor" <?php echo isset($_GET['actor']) ? "selected" : ""; ?>>By actor</option>
                    </select>
                </div>
                <label for="search" class="col-sm-3 control-label text-right">Search criteria</label>
                <?php
                    $search = isset($_GET['title']) ? $_GET['title'] : "";
                    $search .= isset($_GET['actor']) ? $_GET['actor'] : "";
                ?>
                <div class="col-sm-6">
                    <input  type="text"
                            class="form-control"
                            id="search"
                            placeholder="Insert search criteria"
                            value="<?= $search; ?>">
                </div>
            </div>
        </div>

        <hr>

        <?php
            if (!isset($_GET["sort"]) || $_GET["sort"]=="ASC") {
                $sortUrl = "DESC";
                $sortDirection = "up";
            } else if($_GET["sort"]=="DESC") {
                $sortUrl = "ASC";
                $sortDirection = "down";
            }
        ?>
        <div class="row">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>№ </th>
                    <th>
                        <a href="index.php?sort=<?= $sortUrl; ?>">
                            Title&nbsp;<span class="arrow <?= $sortDirection; ?>"></span>
                        </a>
                    </th>
                    <th>Release year</th>
                    <th>Format</th>
                    <th>Cast</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?= getTableRows($db, $where, $sort); ?>
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
