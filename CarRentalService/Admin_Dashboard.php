<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if ( empty($_SESSION['Admin_Name']) and !isset($_SESSION['Admin_ID'])) {
        // Redirect to a login page or show an error message
        $message = "Value is not set";
    }
    else {
        $message = "Admin ID: " . $_SESSION['Admin_Name'];
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
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css" />

    <style>

        .big-box {

            width: 1000px;
            margin-top:1%; 
            display: auto;

            border: 1px solid #fa9624;
            padding: 3% 4% 3% 4%; 
            background-color: #0c0c0c;
            border-radius: 30px;

        }

        .admin_Dashboard_Heading {

            font-family: 'JetBrains Mono', monospace;
            font-size: 45px; 
            padding-left: 45%; 
            /* padding-top: 5%;  */
            padding-bottom: 2%; 
            color: #fa9624; 
            margin-top:10%;
            /* text-decoration: underline; 
            color: #fa9624; */
        }
        .admin-img {

            max-width: 80%;
            height: auto;
            border-radius: 15px;
        }
        .admin-img:hover{
    
            transform: translateY(-15px) ;
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
            <button style="margin-left: -25%;" type="submit" onclick="location.href='Admin_Edit_Profile.php'">Edit Profile</button>
            <button style="margin-left: 2%; color: red" onclick="location.href='Logout.php'">Log Out</button>
        </div>
    </nav>
    <!--navigation bar ends here-->




    <!-- Showing Error if there is any mistake while signing in -->
    <!-- <?php if(!empty($message)): ?> -->
        <!-- <div style="text-align: center; margin-top:40%" class="alert alert-danger" role="alert"> -->
            <!-- <?php echo $message; ?> -->
        <!-- </div> -->
    <!-- <?php endif; ?> -->


    <h1 class="admin_Dashboard_Heading" style="margin-left:-8%">Admin Properties</h1>
    <div class="container big-box">

        <div class="row">
            <div class="col-4 d-flex justify-content-center">
                <img class="admin-img"  src="ad_Users.png" alt="User_Image" onclick="location.href='Admin_View_Users.php'">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <img class="admin-img"  src="ad_Drivers.png" alt="User_Image" onclick="location.href='Admin_View_Drivers.php'">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <img class="admin-img"  src="ad_Cars.png" alt="User_Image" onclick="location.href='Admin_View_Users.php'">
            </div>
        </div>

        <div class="row" style="margin-top: 5%;">
            <div class="col-4 d-flex justify-content-center">
                <img class="admin-img"  src="add_U.png" alt="User_Image" onclick="location.href='Admin_View_Users.php'">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <img class="admin-img"  src="add_D.png" alt="User_Image" onclick="location.href='Admin_View_Users.php'">
            </div>
            <div class="col-4 d-flex justify-content-center">
                <img class="admin-img"  src="add_C.png" alt="User_Image" onclick="location.href='Admin_Add_Cars.php'">
            </div>
        </div>
    </div>

    


    
    




    
    <!-- Javascript Codes:  -->
    
   
</body>
</html>