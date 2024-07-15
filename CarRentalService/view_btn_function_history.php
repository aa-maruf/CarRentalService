<?php

    ob_start();

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if (isset($_GET['booking_id'])) {
        // Store the user ID in a session variable
        $_SESSION['booking_id'] = $_GET['booking_id'];

        // Redirect to the full info page
        header("Location: Booking_View.php");
        exit();
    } else {
        // Handle the case when no user ID is provided
        echo "User ID not provided.";
    }

    ob_end_flush();
?>