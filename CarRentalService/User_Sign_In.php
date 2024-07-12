<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(  $_SERVER['REQUEST_METHOD'] === 'POST' ) {

        // Taking information from the form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $num = mysqli_real_escape_string($conn, $_POST['num']);
        $nid = mysqli_real_escape_string($conn, $_POST['nid']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']); 
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT); //encriypting pass
        $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']); 


        // checking if the user already exists or not
        $select = mysqli_query($conn, "SELECT * FROM User_Informations WHERE User_Email = '$email' OR 	User_NID_Info = '$nid' OR User_Contact_Number ='$num'") or die(mysqli_error($conn));


        $message = "";

        // checking email validation
        if (preg_match('/[A-Z\s]/', $email)) {
            $message = "Email contains Uppercase Letter or Space.";
        }

        // Checking Contact Length and validation
        else if (!preg_match('/^(013|014|015|016|017|018|019)\d{8}$/', $num)) {
            $message = 'Invalid Contact Number';
        }

        // Checking NID Length and validation
        else if (!preg_match('/^[1-9]\d{9}$/', $nid)) {
            $message = 'Invalid NID Number';
        } 

        // Checking Password Length and Validation
        else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{4,}$/', $pass)) {
            $message = 'Password must be of Minimum Length 5 and must contains an Uppercase, a Lowercase and a Digit';
        }

        else if ($pass !== $cpass) {
            $message = 'Password and Confirm Password must be same.';
        }

        // Checking if the user already exits
        else if(mysqli_num_rows($select) > 0){ 
            $message = 'User already exists';
        }
        
        // Inserting data on the table
        else{

            $insert = mysqli_query($conn, "INSERT INTO User_Informations(User_Name, User_Email, User_Password, 	User_NID_Info, User_Contact_Number ) VALUES('$name', '$email', '$hashedPassword', '$nid', '$num')") or die(mysqli_error($conn));

            // Check if insertion was successful
            if($insert){
                $message = 'Registered successfully!';
                header("Location: User_Login.php");
                exit();
            }
            else {
                $message = 'Registration failed!';
            }
            // $message = 'Well Done Romo!!!';

        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>User Sign IN</title>
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
        <h1 class="heading-for-login" style="color: #fa9624;">User Sign In</h1><br>
        <h6 style="color: white;">Welcome to Car Rental Service</h6>
    </div>
    


    <!--Sign In box Starts here-->
    <form class="needs-validation container sign-up-back"  method="post" novalidate>

        <!-- Showing Error if there is any mistake while signing in -->
        <?php if(!empty($message)): ?>
            <div style="text-align: center;" class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>



        <div style="margin-bottom: 5%; margin-top: 8%"> <!-- Full Name -->
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control input-design" name="name" placeholder="Ibn Omar Romel" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please choose a Name.
            </div>
        </div>

        <div style="margin-bottom: 5%;"><!-- Email --> 
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control input-design" name="email" placeholder="name@example.com" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please choose a valid Email.
            </div>
        </div>
            

        <div style="margin-bottom: 5%;"><!-- Contact Number -->
            <label for="num" class="form-label">Contact Number</label>
            <input type="text" class="form-control input-design" name="num" placeholder="01611111111" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please give a contact number.
            </div>
        </div>  
        
        
        <div style="margin-bottom: 5%;"><!-- NID Number -->
            <label for="nid" class="form-label">NID Number</label>
            <input type="text" class="form-control input-design" name="nid" placeholder="2019*" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please give a NID Number.
            </div>
        </div> 

            
        <div style="margin-bottom: 5%;"><!-- Password -->
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control input-design" name="password" placeholder="iBn@1234" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please select a Password.
            </div>
        </div> 

        <div style="margin-bottom: 5%;"><!-- Confirm Password -->
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control input-design" name="cpassword" placeholder="iBn@1234" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please select a Password.
            </div>
        </div> 

        <div style="margin-bottom: 10%;"> <!-- Terms and Conditions -->

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
              <label class="form-check-label" for="invalidCheck" style="font-size: 90%;">
                Agree to <a href="Terms_and_Conditions.php">terms and conditions</a>
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
        </div>


            
        <div > <!--Button-->
            <button style="margin-left: 30%;
                            margin-right: 30%;
                            margin-top: 5%;
                            margin-bottom: 8%;" type="submit" name="submit">SIGN IN</button>
        </div>

        <div> <!--Bottom Login-->
            <h6 style=" margin-left: 25%; color: white;">Already have an account? <a style="font-weight: bold;" href="User_Login.php">Login</a> </h6>
        </div>
    </form>




    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
   
</body>
</html>
