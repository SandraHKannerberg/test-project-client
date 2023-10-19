<?php
session_start();
if (isset($_POST["id"]) && isset($_POST["new_data"])) {
    $userId = $_POST["id"];
    $newData = $_POST["new_data"]; // Användarinput

    // URL to Quarkus PUT-endpoint
    $putEndpoint = "http://localhost:8080/users/" . $userId;

    $user = array(
        'id' => $userId,
        'name' => $name,
        'country' => $country
    );

    // Data to send with PUT-request
    $putData = json_encode(array($user));

    $ch = curl_init();

    // cURL-settings for PUT
    curl_setopt($ch, CURLOPT_URL, $putEndpoint);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $putData); // Send PUT-data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($putData)
    ));

    // Make the PUT-request
    $response = curl_exec($ch);

    // Check the PUT request
    if ($response === false) {
        echo "Failed to update the user: " . curl_error($ch);
    } else {
        echo "The user with id " . $userId . " is now updated.";
        $_SESSION['completed_message'] = "<i class='fa-solid fa-check'></i> User with id " . $userId . " is updated.";
    }

    // Close cURL
    curl_close($ch);
}
?>
