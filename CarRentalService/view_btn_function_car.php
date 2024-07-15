<?php

    ob_start();

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if (isset($_GET['car_id'])) {
        // Store the user ID in a session variable
        $_SESSION['viewed_car_id'] = $_GET['car_id'];

        // Redirect to the full info page
        header("Location: Car_Full_Info.php");
        exit();
    } else {
        // Handle the case when no user ID is provided
        echo "Car ID not provided.";
    }

    ob_end_flush();
?>