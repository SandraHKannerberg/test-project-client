<?php
session_start();
ob_start();
// Connect to the database
include("../database/connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $country = htmlspecialchars($_POST["country"]);

    //If some input missing data
    if (empty($name) || empty($country)) {

        //Error-message sent to index.php 
        $_SESSION["error_message"] = "<i class='fas fa-exclamation-circle'></i> Enter both your name and country before Submit";
        header("Location: ../../index.php");
        exit();
    }

    // Check if name is available
    $checkQuery = "SELECT * FROM user_table WHERE name='$name'";
    $result = $conn->query($checkQuery);
    if ($result->num_rows > 0) {
        // User already exists
        $_SESSION["error_name"] = "<i class='fas fa-exclamation-circle'></i> Name already exists! Try again";
        header("Location: ../../index.php");
        exit();
    }
    
    //Associative array who match UserDto in Quarkus
    $userDto = array(
        "name" => $name,
        "country" => $country
    );
    
    //Convert the array to JSON format
    $jsonUserDto = json_encode($userDto);

    //POST request to Quarkus server
    $url = "http://quarkus-server:8080/users";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonUserDto);

    //Inform Quarkus that you send and accept JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Accept: application/json"
    ));

    //Response from Quarkus
    $response = curl_exec($ch);

    //Handle the response from Quarkus
    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
    } else {
        echo $response;
        curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //Success
        $_SESSION["success_message"] = "<i class='fa-solid fa-check'></i> Congratulations! You are now added as a user!";
 
        ob_end_flush();
        //We send the user back to the frontpage
        header("Location: ../../index.php");
    }

} else {
    //If user tries to enter post.php without a POST request, make them stay in the frontpage
    header("Location: ../../index.php");
}


//Close curl
curl_close($ch);
?>