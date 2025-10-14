<?php


$server = "";
$user = "";
$pass = "";
$dbname = "";
$connection = new mysqli($server, $user, $pass, $dbname); 
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}





