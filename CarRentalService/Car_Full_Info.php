<?php


    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if (isset($_SESSION['viewed_car_id'])) {
        $Car_ID = $_SESSION['viewed_car_id'];


        $stmt = $conn->prepare("SELECT * FROM Car_Informations WHERE Car_ID = ?");
        $stmt->bind_param("s", $Car_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {

            $car = mysqli_fetch_assoc($result);
    
            
            $id = $car['Car_ID'];
            $brand = $car['Brand'];
            $type = $car['Car_Type'];
            $model = $car['Model'];
            $nump = $car['Number_Plate'];
            $seat = $car['Seat'];
            $fuel = $car['Fuel'];
            $mileage = $car['Mileage'];
            $rent = $car['Rent_Cost'];
            $rate = $car['Rating'];
            
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
        <h1 style="color: #fb8500;" class="heading-for-login">Car Informations</h1><br>
    </div>

    <div class="container sign-up-back" style="margin-left:25%;">

        <div class="col-12">
            <h4 style="color: #fa9624;">ID :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $id; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Brand :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $brand; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Model :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $model; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Type :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $type; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Number Plate :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $nump; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Available Seat :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $seat; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Fuel Type :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $fuel; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Mileage :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $mileage; ?></span>&nbsp; KM Per Litre</h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Rent:&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $rent; ?></span>&nbsp; Tk Per Day</h4>
        </div>

        <div > <!--Button-->
            <button style="margin-left: 30%;
                            margin-right: 30%;
                            margin-top: 15%;
                            margin-bottom: 1%;" onclick="location.href='Booking_Information.php'">Rent</button>
        </div>


    </div>
    






    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>