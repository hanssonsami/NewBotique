<?php


$server = "localhost";
$user = "root";
$pass = "";
$dbname = "botique";
$connection = new mysqli($server, $user, $pass, $dbname); 
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}





