<?php
//Connect to database from the Docker container
$servername = '172.22.64.1';
$username = 'root';
$password = 'test';
$database = 'test-uppgift';
$port = 3307;

$conn = mysqli_connect($servername, $username, $password, $database, $port);

//Check the connection
if ($conn->connect_error) {
    die("Couldn't connect to database: " . $conn->connect_error);
}
?>