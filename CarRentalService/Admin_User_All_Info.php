<?php


    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();

    if (isset($_SESSION['viewed_user_id'])) {
        $User_ID = $_SESSION['viewed_user_id'];


        $stmt = $conn->prepare("SELECT * FROM User_Informations WHERE User_ID = ?");
        $stmt->bind_param("s", $User_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {

            $user = mysqli_fetch_assoc($result);
    
            $id = $user['User_ID'];
            $name = $user['User_Name'];
            $email = $user['User_Email'];
            $nid = $user['User_NID_Info'];
            $contact = $user['User_Contact_Number'];
            $econtact = $user['User_Emergency_Contact'];
            $gender = $user['User_Gender'];
            $address= $user['User_Address'];

        }
    } else {
        // Handle the case when no user ID is stored in the session
        echo "User ID not found in the session.";
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
        <h1 style="color: #fb8500;" class="heading-for-login">User Informations</h1><br>
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


    </div>
    






    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    
   
</body>
</html>