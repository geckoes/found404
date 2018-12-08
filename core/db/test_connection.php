<?php
require("database.php");
$servername = $_POST['servername'];
$dbname = $_POST['dbname'];
$username = $_POST['username'];
$password = $_POST['pwd'];
$prefix = $_POST['prefix'];

$dsn = "mysql:dbname=$dbname;host=$servername";
$test = "not started";
$db = new database($servername, $dbname, $username, $passowrd, $prefix);
$test = $db->testConnection();

echo $test;
