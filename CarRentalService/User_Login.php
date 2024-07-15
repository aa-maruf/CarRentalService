<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $message = '';

    if( $_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        // Hash the entered password for verification
        $stmt = $conn->prepare("SELECT User_ID, User_Name, User_Password FROM User_Informations WHERE User_Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){

            session_start();

            $row = $result->fetch_assoc();
            $hashedPasswordFromDatabase = $row['User_Password'];

            if(password_verify($password, $hashedPasswordFromDatabase)){
                $_SESSION['User_ID'] = $row['User_ID'];
                $_SESSION['User_Name'] = $row['User_Name'];

                header("Location: User_Dashboard.php");
                exit();
            } 
            else {
                $message = 'Incorrect Email or Password!';
            }
        } 
        else {
            $message = 'User Does not Exist!';
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>User Login</title>
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
        <h1 class="heading-for-login">User Login</h1><br>
        <h6 style="color: white;">Welcome Back</h6>
    </div>
    


    <!--Sign In box Starts here-->
    <form class="needs-validation container sign-up-back"  method="post" novalidate>


    <!-- Showing Error if there is any mistake while signing in -->
    <?php if(!empty($message)): ?>
        <div style="text-align: center;" class="alert alert-danger" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div style="margin-bottom: 5%; margin-top: 10%">
            <label for="email" class="form-label">Email address</label><br>
            <input type="email" class="form-control input-design" name ="email" placeholder="name@example.com" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please choose a valid Email.
            </div>
        </div>

        <div style="margin-bottom: 5%;">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control input-design" name="password" placeholder="iBn@1234" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please select a Password.
            </div>
        </div>
            
        <div > <!--Button-->
            <button style="margin-left: 30%;
                            margin-right: 30%;
                            margin-top: 5%;
                            margin-bottom: 8%;" type="submit" name = "submit">LOGIN</button>


        <div> <!-- Forget Password -->
            <h6 style=" margin-left: 35%;"><a style="font-weight: bold;" href="Forget_Password.php">Forget Password?</a> </h6>
        </div>

        <div> <!--Bottom Login-->
            <h6 style=" margin-left: 28%; color: white; margin-top: 8%">Don't have an account? <a style="font-weight: bold;" href="User_sign_in.php">Sign In</a> </h6>
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