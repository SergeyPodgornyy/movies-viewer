<?php
require_once("inc/db.php");
require_once("inc/functions.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM info, cast USING info, cast WHERE info.id=cast.info_id AND cast.info_id=" . $id;

    deleteItem($db, $sql);
    header("Location: index.php");
} else {
    header("Location: index.php");
    exit;
}
