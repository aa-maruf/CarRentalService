<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if( $_SERVER['REQUEST_METHOD'] === 'POST') {

        // Taking information from the form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $num = mysqli_real_escape_string($conn, $_POST['num']);
        $nid = mysqli_real_escape_string($conn, $_POST['nid']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']); 
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT); //encriypting pass
        $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']); 


        // checking if the user already exists or not
        // $select = mysqli_query($conn, "SELECT * FROM user_form WHERE User_Email = '$email' OR 	User_NID_Info = '$nid' OR User_Contact_Number ='$num'") or die(mysqli_error($conn));


        // Checking if the user already exits
        // if(mysqli_num_rows($select) > 0){ 
        //     $message = 'User already exists';
        // }
        // // Inserting data on the table
        // else{

            $insert = mysqli_query($conn, "INSERT INTO User_Info_romo(User_Name, User_Email, User_Password, 	User_NID_Info, User_Contact_Number ) VALUES('$name', '$email', '$hashedPassword', '$nid', '$num')") or die(mysqli_error($conn));

            // Check if insertion was successful
            if($insert){
                $message = 'Registered successfully!';
                header("Location: User_Login.php");
                exit();
            }
            else {
                $message = 'Registration failed!';
            }
        // }

    }
?>