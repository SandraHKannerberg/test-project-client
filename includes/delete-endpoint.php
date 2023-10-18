<?php
if (isset($_POST['userId'])) {

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $userId = $_POST['userId'];
//URL to Quarkus DELETE endpoint
$deleteEndpoint = 'http://localhost:8080/users/' . $userId;

//Create a curl-resurs
$ch = curl_init();

//curl-settings for DELETE request
curl_setopt($ch, CURLOPT_URL, $deleteEndpoint);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Do the DELETE-request
$response = curl_exec($ch);

//Check if the request was successfull
if ($response === false) {
    echo 'Failed to delete the user: ' . curl_error($ch);
} else {
    echo 'The user is now successfully deleted. Server answer: ' . $response;
}

//Close curl
curl_close($ch);
}
?>