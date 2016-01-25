<?php
include("inc/db.php");
include("inc/functions.php");

if(isset($_POST['title'])&&isset($_POST['year'])&&isset($_POST['format'])&&isset($_POST['cast'])){

function clear($text){
	$text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}

$title = clear($_POST['title']);
$year = clear($_POST['year']);

if(!preg_match('/(1|2)[0-9]{3}/', $year)){
	$year=date("Y");
}

$format = clear($_POST['format']);
$cast = explode(",",clear($_POST['cast']));

foreach ($cast as $key => $value) {
	$trimmed = trim($value);

	$pieces = explode(' ', $trimmed);
	$surname = array_pop($pieces);
	$name = implode(" ",$pieces);

	$cast[$key] = [$name,$surname];
}

add_item($db,$title,$year,$format,$cast);

    header("location:index.php");
} else {
	header("location:index.php");
	exit;
}