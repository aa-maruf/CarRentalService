<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    session_start();

    if ( empty($_SESSION['User_Name']) and !isset($_SESSION['User_ID'])) {
        // Redirect to a login page or show an error message
        $message = "Value is not set";
    }
    else {
        $message = "User ID: " . $_SESSION['User_Name'];
    }
   
    if( $_SERVER['REQUEST_METHOD'] === 'POST') {

        $logout = $_POST['logout'];
        if($logout) {
            header("Location: Logout.php");
            exit();
        }
        
    }

    $sql = "Select * from Car_Informations";
    $result = mysqli_query($conn, $sql);
?>



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>User | Dashboard</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css" />
    <style>

        .card_tra:hover {

            transform: translateY(-15px) ;
        }

        h2 {    

            color: #fa9624;
            background-color: black;
            border: 2px solid aqua;
            border-radius: 8px;
            padding: 4% 2% 4% 2%;

        }
        h2:hover {

            transform: translateY(-10px) ;
        }
    </style>

</head>
<body style="background-color: black; padding: 0%; margin: 0%;">

    <!-- navigation part -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" style="padding-top: 2%; ">
        <div class="container" style="padding-left: 5%; padding-right: 3%; ">
            <a class="navbar-brand nav-logo" href="Landing_Page.php" ><b>C.R.S</b></a>
        </div>

        <div > <!--Button-->
            <button style="margin-left: -25%;" type="submit" onclick="location.href='User_Edit_Profile.php'">Edit Profile</button>
            <button style="margin-left: 2%; color: red" onclick="location.href='Logout.php'">Log Out</button>
        </div>
    </nav>
    <!--navigation bar ends here-->


    <div class="sign-up-back" style=" text-align: center ; margin-left: 27.5%; margin-top:10%; margin-bottom: 2%;">

        <h2 onclick="location.href='Booking_History.php'">Booking History</h2>
        
    </div>


    <?php

        if ($result->num_rows > 0) {
            echo '<div class="d-flex justify-content-center sign-up-back" style="margin-left: 25%; margin-top:5%; width:900px">
                    <div class="row">';

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col" style="margin-bottom:4%;">
                            <div class="card card_tra" style="background-color: #1B2A41;width: 18rem; margin-right:1%;">
                                <div class="card-body">
                                    <h4 class="card-title" style="color:#fa9624">' . $row['Brand'] . '</h4>
                                    <h5><p class="card-text" style="color: white">Model: ' . $row['Model'] . '</p></h5>
                                    <h5><p class="card-text" style="color: white">Rental Cost: ' . $row['Rent_Cost'] . '</p></h5>
                                    <h5><p class="card-text" style="color: white">Available Seats: ' . $row['Seat'] . '</p></h5>
                                    <a href="view_btn_function_car.php?car_id=' . $row['Car_ID'] . '" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>';
                }
                    echo '</div></div>';
        } else {
            echo "No cars found.";
        }
        $conn->close();
    ?>


    




    
    <!-- Javascript Codes:  -->
    
   
</body>
</html>