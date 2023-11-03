<?php
//Connect to database
// $servername = 'localhost';
// $username = 'root';
// $password = 'root';
// $database = 'test-uppgift';
// $port = 3307; //If not standard

// $conn = new mysqli($servername, $username, $password, $database, $port);

// //Check the connection
// if ($conn->connect_error) {
//     die("Couldn't connect to database: " . $conn->connect_error);
// }


$conn = mysqli_connect(
    'db', # service name
    'root', # user
    'root', # password
    'test-uppgift' # database
);

$table_name = "user_table"

?>
