<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if ( empty($_SESSION['Driver_Name']) and !isset($_SESSION['Driver_ID'])) {
        // Redirect to a login page or show an error message
        $message = "Value is not set";
    }
    else {
        $message = "Driver Name: " . $_SESSION['Driver_Name'];
    }
   

    if( $_SERVER['REQUEST_METHOD'] === 'POST') {

        $logout = $_POST['logout'];
        if($logout) {
            header("Location: Logout.php");
            exit();
        }
        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>Driver | Dashboard</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css" />

</head>
<body style="background-color: black; padding: 0%; margin: 0%;">

    <!-- navigation part -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" style="padding-top: 2%; ">
        <div class="container" style="padding-left: 5%; padding-right: 3%; ">
            <a class="navbar-brand nav-logo" href="Landing_Page.php" ><b>C.R.S</b></a>
        </div>

        <div > <!--Button-->
            <button style="margin-left: -25%;" type="submit" onclick="location.href='Driver_Edit_Profile.php'">Edit Profile</button>
            <button style="margin-left: 2%; color: red" onclick="location.href='Logout.php'">Log Out</button>
        </div>
    </nav>
    <!--navigation bar ends here-->




    <!-- Showing Error if there is any mistake while signing in -->
    <?php if(!empty($message)): ?>
        <div style="text-align: center; margin-top:40%" class="alert alert-danger" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    




    
    <!-- Javascript Codes:  -->
    
   
</body>
</html>