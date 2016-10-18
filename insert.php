<?php
require_once("inc/db.php");
require_once("inc/functions.php");

if (isset($_POST['title']) && isset($_POST['year']) && isset($_POST['format']) && isset($_POST['cast'])) {

    $title = clear($_POST['title']);
    $year = clear($_POST['year']);

    if (!preg_match('/(1|2)[0-9]{3}/', $year)) {
        $year = date("Y");
    }

    $format = clear($_POST['format']);
    $cast = explode(",", clear($_POST['cast']));

    foreach ($cast as $key => $value) {
        $trimmed = trim($value);

        $pieces = explode(" ", $trimmed);
        $surname = array_pop($pieces);
        $name = implode(" ", $pieces);

        $cast[$key] = [$name, $surname];
    }

    addItem($db, $title, $year, $format, $cast);

    header("Location: index.php");
} else {
    header("Location: index.php");
    exit;
}
