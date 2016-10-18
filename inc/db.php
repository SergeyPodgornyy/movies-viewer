<?php

require_once("Database.class.php");

$config = require_once(__DIR__ . '/../etc/config.php');
$dbConfig = $config['database'];

$db = Database::getInstance();
$db->connect($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);
