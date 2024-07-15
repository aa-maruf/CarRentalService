<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if( $_SERVER['REQUEST_METHOD'] === 'POST') {

        // Taking information from the form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $num = mysqli_real_escape_string($conn, $_POST['num']);
        $emer_num = mysqli_real_escape_string($conn, $_POST['emer_num']);
        $addr = mysqli_real_escape_string($conn, $_POST['addr']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        


        $message = "";

        //Updating User Name
        if ( !empty($name)) {

            $stmt = $conn->prepare("UPDATE User_Informations SET User_Name = ? WHERE User_ID = ?");
            $stmt->bind_param("si", $name, $_SESSION['User_ID']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "";
            } else {
                $message = "No rows updated. User_ID may not exist or the value is already the same.";
            }
        }


        // Updating User Email
        if (preg_match('/[A-Z\s]/', $email)) {
            $message = "Email contains Uppercase Letter or Space.";
        }
        else if (!empty($email)) {

            $stmt = $conn->prepare("UPDATE User_Informations SET User_Email = ? WHERE User_ID = ?");
            $stmt->bind_param("si", $email, $_SESSION['User_ID']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "";
            } else {
                $message = "No rows updated. User_ID may not exist or the value is already the same.";
            }
        }



        // Updating User Contact Number
        if (!preg_match('/^(013|014|015|016|017|018|019)\d{8}$/', $num)) {
            $message = 'Invalid Contact Number';
        }
        else if (!empty($num)) {

            $stmt = $conn->prepare("UPDATE User_Informations SET User_Contact_Number = ? WHERE User_ID = ?");
            $stmt->bind_param("si", $num, $_SESSION['User_ID']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "";
            } else {
                $message = "No rows updated. User_ID may not exist or the value is already the same.";
            }
        }


        // Updating User Emergency Contact Number
        if (!preg_match('/^(013|014|015|016|017|018|019)\d{8}$/', $emer_num)) {
            $message = 'Invalid Contact Number';
        }
        else if (!empty($emer_num)) {

            $stmt = $conn->prepare("UPDATE User_Informations SET User_Emergency_Contact = ? WHERE User_ID = ?");
            $stmt->bind_param("si", $emer_num, $_SESSION['User_ID']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "";
            } else {
                $message = "No rows updated. User_ID may not exist or the value is already the same.";
            }
        }



        if ( !empty($gender)) {

            $stmt = $conn->prepare("UPDATE User_Informations SET User_Gender = ? WHERE User_ID = ?");
            $stmt->bind_param("si", $gender, $_SESSION['User_ID']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "";
            } else {
                $message = "No rows updated. User_ID may not exist or the value is already the same.";
            }
        }




        // Updating User Address
        if ( !empty($addr)) {

            $stmt = $conn->prepare("UPDATE User_Informations SET User_Address = ? WHERE User_ID = ?");
            $stmt->bind_param("si", $addr, $_SESSION['User_ID']);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "";
            } else {
                $message = "No rows updated. User_ID may not exist or the value is already the same.";
            }
        }

        header("Location: User_Dashboard.php");
        exit();
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>USER | Edit | Profile</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css" />

</head>
<body style="background-color: black; padding: 0%; margin: 0%;">

    <!-- navigation part -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" style="padding-top: 2%; ">
        <div class="container-fluid" style="padding-left: 5%; padding-right: 3%; ">
            <a class="navbar-brand nav-logo" href="Landing_Page.php" ><b>C.R.S</b></a>
        </div>
    </nav>
    <!--navigation bar ends here-->




    <!-- Sign In Heading -->
    <div class="container" style="text-align: center">
        <h1 style="color: #fa9624;" class="heading-for-login">Edit Profile</h1><br>
    </div>
    


    <!--Sign In box Starts here-->
    <form class="container sign-up-back" style="width:1000px"  method="post">



        <!-- Showing Warning -->
        <?php if(!empty($message)): ?>
            <div style="text-align: center; margin-top:5%; margin-bottom: 5%;" class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>



        <div style="margin-bottom: 5%;">
            <img style="height: 200px;
                        width: 200px;
                        border: 5px solid #fa9624;
                        border-radius: 50%;
                        margin-left: 37%" src="Image_Folder/Gojo.jpeg" alt="profile picture">
        </div>



        <div style="margin-bottom: 5%;">
            <label style="margin-left: 40%;" for="propic" class="form-label">Update Profile Pic</label><br>
            <input style="width: 105px; margin-left: 43%" type="file" class="form-control" name="propic">
        </div>

        <div class="row" style="margin-bottom: 5%;"> <!--Name-->
            <div class="col-8">
                <label for="name" class="form-label">Name</label><br>
                <input type="name" class="form-control input-design" name="name" placeholder="Ibn Omar">
            </div>
        </div>

        <div style="margin-bottom: 5%; margin-top:5%"> <!--Email-->
            <label for="email" class="form-label">Email address</label><br>
            <input type="email" class="form-control input-design" name="email" placeholder="name@example.com">
        </div>

        <div class="row" style="margin-bottom: 5%;"> <!--Contact Number-->

            <div class="col-6">
                <label for="num" class="form-label">Contact</label><br>
                <input type="number" class="form-control input-design" name="num" placeholder="017********">
                
            </div>
            <div class="col-6"> <!--Emergency Contact Number-->
                <label for="emer_num" class="form-label">Emergency Contact</label><br>
                <input type="number" class="form-control input-design" name="emer_num" placeholder="017********">
            </div>
        </div>


        <div>  <!-- Gender Field -->
            <label for="gender" class="form-label">Gender</label><br>

            <div style="display:inline-block;">
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Male" >
                    <label style="font-size: 95%;" class="form-check-label" for="gender">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female" >
                    <label style="font-size: 95%;" class="form-check-label" for="gender">
                        Female
                    </label>
                </div>

            </div>
        </div>


        
        <div style="margin-bottom: 5%; margin-top:5%"> <!--Address-->
            <label for="addr" class="form-label">Address</label><br>
            <input type="text" class="form-control input-design" name="addr" placeholder="name@example.com">
        </div>


        <div > <!--Button-->
            <button style="margin-left: 35%;
                            margin-right: 30%;
                            margin-top: 10%; padding-top:1.5%"
                    type="submit" name="submit">Confirm</button>
        </div>

    </form>




    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>