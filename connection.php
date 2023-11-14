<?php
$servername = "db";
$username = "root";
$password = "test";
$database = "test-uppgift";
$port = 3306;

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Couldn't connect to the database: " . $conn->connect_error);
}
?>