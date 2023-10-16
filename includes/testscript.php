<?php
//This page is just for the developer, it will not be showed for the user

session_start();

//Statement to check if the user reach the page correct.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = htmlspecialchars($_POST['name']);
    $country = htmlspecialchars($_POST['country']);

    //If some input missing data
    if (empty($name) || empty($country)) {

        //Error-message sent to index.php 
        $_SESSION['error_message'] = "*All fields are required";
        header('Location: ../index.php');
        exit();
    }

    //Success
    $_SESSION['success_message'] = "Successfully added a new user! <br> Name: $name, Country: $country";
 
    // echo 'Theses are the data that the user submitted';
    // echo '<br>';
    // echo $name;
    // echo '<br>';
    // echo $country;

    //We send the user back to the frontpage
    header('Location: ../index.php');
    echo 'Successfull!';
} else {
    //If to enter the page correct, the user going back to frontpage
    header('Location: ../index.php');
}


