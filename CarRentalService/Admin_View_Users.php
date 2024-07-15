<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "Select * from User_Informations";
    $result = mysqli_query($conn, $sql);
    
?>



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>Admin | View | Users</title>
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
            <a class="navbar-brand nav-logo" ><b>C.R.S</b></a>
        </div>
    </nav>
    <!--navigation bar ends here-->




    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 10%;">
                    <div class="card-header">
                        <h2 class="display-6 text-center"><b>User Informations</b></h2>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td style="background-color: black; color: #fa9624;"><b>ID</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>Name</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>Email</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>NID</b></td> 
                                <td style="background-color: black; color: #fa9624;"><b>Contact</b></td>
                                <td style="background-color: black; color: #fa9624;"><b>Details</b></td>
                            </tr>

                            <tr>
                                <?php  
                                
                                    while( $row = mysqli_fetch_assoc($result)) 
                                    {
                                ?>  
                                    <td> <?php echo $row['User_ID']; ?></td>      
                                    <td> <?php echo $row['User_Name']; ?></td>      
                                    <td> <?php echo $row['User_Email']; ?></td>      
                                    <td> <?php echo $row['User_NID_Info']; ?></td>      
                                    <td> <?php echo $row['User_Contact_Number']; ?></td>      
                                    <td> <a href="view_btn_function.php?user_id=<?php echo $row['User_ID']; ?>" class="btn btn-primary">View</a></td>      

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