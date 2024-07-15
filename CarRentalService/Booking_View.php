<?php


    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    $message = $_SESSION['booking_id'] . '   ' .  $_SESSION['viewed_car_id'] . '    ' . $_SESSION['User_ID'];

    if (isset($_SESSION['booking_id'])) {
        $Booking_ID = $_SESSION['booking_id'];


        $stmt = $conn->prepare("SELECT * FROM Booking WHERE Booking_ID = ?");
        $stmt->bind_param("s", $Booking_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {

            $book = mysqli_fetch_assoc($result);
    
            
            $id = $book['Booking_ID'];
            $uid = $book['User_ID'];
            $cid = $book['Car_ID'];
            $pay = $book['Payment_Status'];
            $amount = $book['Amount'];
            $booking = $book['Booking_Date'];
            $rent = $book['Rent_Date'];
            $return = $book['Return_Date'];
            $location = $book['Location'];
            $time = $book['Time'];
            
            
        }
    } else {
        // Handle the case when no user ID is stored in the session
        echo "Car ID not found in the session.";
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>User | Car | Full Informations</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css" />

</head>
<body style="background-color: black; padding: 0%; margin: 0%;">

    <!-- navigation part -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" style="padding-top: 2%; ">
        <div class="container-fluid" style="padding-left: 5%; padding-right: 3%; ">
            <a class="navbar-brand nav-logo" href="Landing_Page.php"><b>C.R.S</b></a>
        </div>
    </nav>
    <!--navigation bar ends here-->




    <!-- Sign In Heading -->
    <div class="container" style="text-align: center">
        <h1 style="color: #fb8500;" class="heading-for-login">Booking Informations</h1><br>
    </div>

    <div class="container sign-up-back" style="margin-left:30%;">

        <div class="col-12">
            <h4 style="color: #fa9624;">BookingID :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $id; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">User ID :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $uid; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Car ID :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $cid; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Amount :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $amount; ?></span>&nbsp; TK</h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Payment Status :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $pay; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Booking Date :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $booking; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Rent Date :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $rent; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Return Date :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $return; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Pick Up Location :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $location; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Pick Up Time :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $time; ?></span></h4>
        </div>

        <div > <!--Button-->
            <button style="margin-left: 30%;
                            margin-right: 30%;
                            margin-top: 15%;
                            margin-bottom: 1%;" onclick="location.href='User_Dashboard.php'">Done</button>
        </div>
    </div>
    






    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>