<?php
include("inc/db.php");
include("inc/functions.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];

    $sql = "DELETE FROM info, cast USING info, cast WHERE info.id=cast.info_id AND cast.info_id=".$id;

    delete_item($db,$sql);
    header("location:index.php");
} else {
	header("location:index.php");
	exit;
}