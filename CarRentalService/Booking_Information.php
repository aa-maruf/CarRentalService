<?php


    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    // $message = $_SESSION['viewed_car_id'] . '    ' . $_SESSION['User_ID'] ;


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Retrieve form data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $start_date = $_POST['start_date']; 
        $end_date = $_POST['end_date'];    
        $booking_time  = mysqli_real_escape_string($conn, $_POST['booking_time']); 
        $booking_date = date('Y-m-d');


        $date_diff = date_diff(date_create($start_date), date_create($end_date));
        $num_days = $date_diff->format('%a');

       
        $user_id = $_SESSION['User_ID'];
        $car_id = $_SESSION['viewed_car_id'];
        
        $rental_cost_query = "SELECT Rent_Cost FROM Car_Informations WHERE Car_ID = $car_id";
        $result = $conn->query($rental_cost_query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $rental_cost = $row['Rent_Cost'];

            // Calculate the amount
            $amount = ($num_days * $rental_cost) + $rental_cost;
        }

        $payment = 'Paid';


        // $message = $start_date;
    
        // Insert data into the BookingInformation table

        $insertQuery = "INSERT INTO Booking(User_ID, Car_ID, Payment_Status, Amount, Rent_Date, Return_Date, Booking_Date, Location, Time) VALUES ('$user_id', '$car_id', '$payment', '$amount ', '$start_date', '$end_date', '$booking_date', '$name', '$booking_time')";
    
        if ($conn->query($insertQuery) === TRUE) {
            $message =  "Record inserted successfully";

            $_SESSION['booking_id'] = $conn->insert_id;

            header("Location: Booking_View.php");
            exit();
        } else {
            $message = "Error: " . $insertQuery . "<br>" . $conn->error;
        }
        
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>Admin | User | Full Informations</title>
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
        <h1 style="color: #fb8500;" class="heading-for-login">Fill Up The Form</h1><br>
    </div>

    <div class="sign-up-back" style="margin-left: 25%;">

        <!-- <?php if(!empty($message)): ?>
            <div style="text-align: center;" class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?> -->


        <form method="post">

            <!-- Input for Location -->
            <div class="mb-3">
                <label for="name" class="form-label">Pick Up Location</label>
                <input type="text" class="form-control input-design" id="name" name="name" required>
            </div>


            <!-- Date Pickers -->
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control input-design" id="start_date" name="start_date" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control input-design" id="end_date" name="end_date" required>
            </div>

            <!-- Time Picker -->
            <div class="mb-3">
                <label for="booking_time" class="form-label">Pick Up Time</label>
                <input type="text" class="form-control input-design" id="booking_time" name="booking_time" required>
            </div>

            <!-- Submit Button -->
            <div > <!--Button-->
                <button style="margin-left: 30%;
                                margin-right: 30%;
                                margin-top: 5%;
                                margin-bottom: 8%;" type="submit" name="submit">Confirm</button>
            </div>
        </form>
    </div>







    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>