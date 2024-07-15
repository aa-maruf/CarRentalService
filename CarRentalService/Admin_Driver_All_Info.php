<?php


    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if (isset($_SESSION['viewed_driver_id'])) {
        $Driver_ID = $_SESSION['viewed_driver_id'];


        $stmt = $conn->prepare("SELECT * FROM Driver_Informations WHERE Driver_ID = ?");
        $stmt->bind_param("s", $Driver_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {

            $driver = mysqli_fetch_assoc($result);
    
            
            $id = $driver['Driver_ID'];
            $name = $driver['Driver_Name'];
            $email = $driver['Driver_Email'];
            $nid = $driver['Driver_NID_Info'];
            $contact = $driver['Driver_Contact_Number'];
            $econtact = $driver['Driver_Emergency_Number'];
            $gender = $driver['Driver_Gender'];
            $address = $driver['Driver_Address'];
            $exp = $driver['Driver_Experience'];
            $rides = $driver['Driver_Total_Ride'];
            $salary = $driver['Driver_Salary'];
            $license = $driver['Driver_license'];

        }
    } else {
        // Handle the case when no user ID is stored in the session
        echo "Driver ID not found in the session.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>Admin | Driver | Full Informations</title>
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
        <h1 style="color: #fb8500;" class="heading-for-login">Driver Informations</h1><br>
    </div>

    <div class="container sign-up-back" style="margin-left:30%;">

        <div class="col-12">
            <h4 style="color: #fa9624;">ID :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $id; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Name :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $name; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Email :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $email; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">NID :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $nid; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Contact Number :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $contact; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Emergency Contact :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $econtact; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Gender :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $gender; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Address :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $address; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Experience :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $exp; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Total Rides :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $rides; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">License :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $license; ?></span></h4>
        </div>
        <div class="col-12">
            <h4 style="color: #fa9624;">Salary :&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: aqua;"><?php echo "". $salary; ?></span></h4>
        </div>

        
    

    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>