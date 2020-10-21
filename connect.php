<?php
$dbhost = "localhost:3306";
$username = "root";
$password = "";
$database = "iwardrobe";

// Create connection
$conn = mysqli_connect($dbhost, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
 }
 
 
?>


