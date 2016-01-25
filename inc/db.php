<?php

include("database.class.php");


$servername = "localhost";
$username = "root";
$password = "password";
$database = "webbylab_movies";

$db = database::getInstance();
$db->connect($servername,$username,$password,$database);