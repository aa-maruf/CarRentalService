<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    $user_ID = $_SESSION['User_ID'];

    $stmt = $conn->prepare("SELECT * FROM Booking WHERE User_ID = ?");
    $stmt->bind_param("s", $user_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    
?>



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>User | Booking History</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css"/>
    <style>

        .table-data-header {
            background-color: black;
            color: #fa9624;
        }
    </style>

</head>
<body style="background-color: black; padding: 0%; margin: 0%;">

    <!-- navigation part -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" style="padding-top: 2%; ">
        <div class="container-fluid" style="padding-left: 5%; padding-right: 3%; ">
            <a class="navbar-brand nav-logo" href="Landing_Page.php"><b>C.R.S</b></a>
        </div>
    </nav>
    <!--navigation bar ends here-->




    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 10%;">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><b>Booking History</b></h2>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td style="background-color: black; color: #fa9624;"><b>Booking ID</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>User ID</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>Car Email</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>Rent Date</b></td> 
                                <td style="background-color: black; color: #fa9624;"><b>Return Date</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>Amount</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>Details</b></td>
                            </tr>

                            <tr>
                                <?php  
                                
                                    while( $row = mysqli_fetch_assoc($result)) 
                                    {
                                ?>  
                                    <td> <?php echo $row['Booking_ID']; ?></td>      
                                    <td> <?php echo $row['User_ID']; ?></td>      
                                    <td> <?php echo $row['Car_ID']; ?></td>      
                                    <td> <?php echo $row['Rent_Date']; ?></td>      
                                    <td> <?php echo $row['Return_Date']; ?></td>      
                                    <td> <?php echo $row['Amount']; ?></td>      
                                    <td> <a href="view_btn_function_history.php?booking_id=<?php echo $row['Booking_ID']; ?>" class="btn btn-primary">View</a></td>      

                            </tr>       

                                <?php
                                    }
                                ?>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>