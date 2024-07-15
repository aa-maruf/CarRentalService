<?php

    $conn = new mysqli('localhost','root', '' ,'Car_Rental_db');

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if( $_SERVER['REQUEST_METHOD'] === 'POST') {

        
        $carType = mysqli_real_escape_string($conn, $_POST['car_type']);
        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $num = mysqli_real_escape_string($conn, $_POST['num']);
        $seat = mysqli_real_escape_string($conn, $_POST['seat']);
        $fuelType = mysqli_real_escape_string($conn, $_POST['fuel_type']);
        $mileage = mysqli_real_escape_string($conn, $_POST['mileage']);
        $cost = mysqli_real_escape_string($conn, $_POST['cost']);


        // Insert into the database
        $validCarTypes = array("Private Car", "Micro", "SUV", "Mini Bus", "Truck", "Pick Up Truck", "Jeep");
        $validFuelTypes = array("Gasoline", "Diesel", "Electric", "Hybrid", "Hydrogen Fuel Cell", "CNG");



        if (!in_array($carType, $validCarTypes)) {
            $message =  "Invalid car type!";
        }
        else if (!in_array($fuelType, $validFuelTypes)) {
            $message = "Invalid fuel type!";
            
        }
        else if (!is_numeric($seat) || $seat < 2 || $seat > 30) {
            $message =  "Invalid Seat Number!";
        }
        else if (!is_numeric($mileage) || $mileage < 5 || $mileage >= 30) {
            $message =  "Invalid Mileage Input!";
        }
        else if (!is_numeric($cost) || $mileage <= 0 ) {
            $message =  "Invalid Cost Input!";
        }
        else if (!preg_match("/^[a-zA-Z]+\sMetro\s[A-Z]\s\d{2}-\d{4}$/", $num)) {
            $message = "Invalid Number Plate!";
        }
        else {

            $insert = mysqli_query($conn, "INSERT INTO `Car_Informations` ( `Brand`, `Car_Type`, `Model`, `Number_Plate`, `Seat`, `Fuel`, `Mileage`, `Rent_Cost`, `Rating`, `Picture`) VALUES ( '$brand', '$carType', '$model', '$num', '$seat', '$fuelType', '$mileage' , '$cost', NULL, NULL);");

            if($insert){
                echo 'Registered successfully!';
                header("Location: Admin_Dashboard.php");
                exit();
            }
            else {
                echo 'Registration failed!';
            }
        }     
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>Admin | Add | Car</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="main.css" />

    <style>


    </style>

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
        <h1 class="heading-for-login" style="color: #fa9624;">Adding New Car</h1><br>
    </div>
    


    <!--Sign In box Starts here-->
    <form class="needs-validation container sign-up-back"  method="post" novalidate>

        <!-- Showing Warning -->
        <?php if(!empty($message)): ?>
            <div style="text-align: center; margin-top:5%; margin-bottom: 5%;" class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>


        <!-- Image Input -->
        <div style="margin-bottom: 5%;">
            <img style="height: 200px;
                        width: 200px;
                        border: 5px solid #fa9624;
                        border-radius: 50%;
                        margin-left: 32%" src="Image_Folder/Gojo.jpeg" alt="profile picture">
        </div>



        <div style="margin-bottom: 5%; text-align:center">
            <label  for="propic" class="form-label">Car Picture</label><br>
            <input style="width: 105px; margin-left: 40.5%" type="file" class="form-control" name="propic">
        </div>
        <!-- Image Input Over -->


        <!-- Car Type --> 
         <!-- <div class="dropdown" id="dropdown1"> 
            <button style="color: white; margin-bottom: 15%;" class="dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Car Type
            </button>
            <ul class="dropdown-menu" >

                <li>
                    <button style="padding-top:8%;" class="dropdown-item" onclick="changeCarType('Private Car', 'dropdown1')">
                        <input type="hidden" name="privatecar" value="Private Car">Private Car
                    </button>
                </li>
                <li>
                    <button style="padding-top:8%;" class="dropdown-item" onclick="changeCarType('Micro', 'dropdown1')">
                        <input type="hidden" name="micro" value="Micro">Micro
                    </button>
                </li>
                <li>
                    <button style="padding-top:8%;" class="dropdown-item" onclick="changeCarType('SUV', 'dropdown1')">
                        <input type="hidden" name="suv" value="SUV">SUV
                    </button>
                </li>
                <li>
                    <button style="padding-top:8%;" class="dropdown-item" onclick="changeCarType('JEEP', 'dropdown1')">
                        <input type="hidden" name="jeep" value="JEEP">JEEP
                    </button>
                </li>
                <li>
                    <button style="padding-top:8%;" class="dropdown-item" onclick="changeCarType('Mini Bus', 'dropdown1')">
                        <input type="hidden" name="minibus" value="JEEP">Mini Bus
                    </button>
                </li>
                <li>
                    <button style="padding-top:8%;" class="dropdown-item" onclick="changeCarType('Pick Up Truck', 'dropdown1')">
                        <input type="hidden" name="pickuptruck" value="Pick Up Truck">Pick Up Truck
                    </button>
                </li>
                <li>
                    <button style="padding-top:8%;" class="dropdown-item" onclick="changeCarType('Truck', 'dropdown1')">
                        <input type="hidden" name="truck" value="Truck">Truck
                    </button>
                </li>
                
            </ul>
        </div>       -->


        <div style="margin-bottom: 5%;"> 
            <label for="car_type" class="form-label">Car Type</label>
            <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="car_type" placeholder="Private Car/ Micro/ SUV/ Mini Bus/ Truck/ Pick Up Truck/ Jeep" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please choose a valid Car Type
            </div>
        </div> 


        <div style="margin-bottom: 5%;">
            <label for="brand" class="form-label">Car Brand</label>
            <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="brand" placeholder="Mercedes" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please choose a valid Brand Name.
            </div>
        </div>


        <div style="margin-bottom: 5%;"> 
             <label for="model" class="form-label">Car Model</label>
            <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="model" placeholder="Mercedes S-Class" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please choose a valid Car Model.
            </div>
        </div>
            

        <div style="margin-bottom: 5%;">  
             <label for="num" class="form-label">Number Plate</label>
            <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="num" placeholder="Dhaka Metro-A 15-0568" required>
            <div class="valid-feedback"></div>
             <div class="invalid-feedback">
                Please give a Valid Number Plate.
            </div>
        </div>
        
        
        <div style="margin-bottom: 5%;">   
            <label for="seat" class="form-label">Available Seat</label> -->
            <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="seat" placeholder="3" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please give a Valid Seat Number
            </div>
        </div> 


        <!-- Fuel Type -->
        <!-- <div class="dropdown" id="dropdown2">
            <button style="color: white; margin-bottom: 15%;" class="dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Fuel Type
            </button>
            <ul class="dropdown-menu" >
                <li><button style="padding-top:8%;" class="dropdown-item" type="submit" name="fuel_type" value="Gasoline (Petrol)" onclick="changeFuelType('Gasoline', 'dropdown2')">Gasoline (Petrol)</button></li>

                <li><button style="padding-top:8%;" class="dropdown-item" type="submit" name="fuel_type" value="Diesel" onclick="changeFuelType('Diesel', 'dropdown2')">Diesel</button></li>

                <li><button style="padding-top:8%;" class="dropdown-item" type="submit" name="fuel_type" value="Electric" onclick="changeFuelType('Electric', 'dropdown2')">Electric</button></li>

                <li><button style="padding-top:8%;" class="dropdown-item" type="submit" name="fuel_type" value="Hybrid (Gasoline/Electric)" onclick="changeFuelType('Hybrid', 'dropdown2')">Hybrid (Gasoline/Electric)</button></li>

                <li><button style="padding-top:8%;" class="dropdown-item" type="submit" name="fuel_type" value="Hydrogen Fuel Cell" onclick="changeFuelType('Hydrogen Fuel Cell', 'dropdown2')">Hydrogen Fuel Cell</button></li>

                <li><button style="padding-top:8%;" class="dropdown-item" type="submit" name="fuel_type" value="CNG" onclick="changeFuelType('CNG', 'dropdown2')">CNG</button></li>
                
            </ul>
        </div> -->

        <div style="margin-bottom: 5%;"> <!--Fuel Type  -->
            <label for="fuel_type" class="form-label">Fuel Type</label>
            <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="fuel_type" placeholder="Gasoline/ Diesel/ Electric/ Hybrid/ Hydrogen Fuel Cell/ CNG" required>
            <div class="valid-feedback"></div>
             <div class="invalid-feedback">
                Please choose a valid Car Type
            </div>
        </div>
        
    
            
        <div style="margin-bottom: 5%;">  
            <label for="mileage" class="form-label">Mileage (KM/Hour)</label>
            <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="mileage" placeholder="10 KM/hour" required>
            <div class="valid-feedback"></div>
             <div class="invalid-feedback">
                 Please Enter a Valid Milaege. 
            </div>
        </div> 

        <div style="margin-bottom: 5%;">
            <label for="cost" class="form-label">Rental Cost</label>
            < <input style="border: 2px solid #fa9624;" type="text" class="form-control input-design" name="cost" placeholder="5000 Tk/Day" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please Enter a Valid Rental Cost.
            </div>
        </div> 


        <div > 
            <button style="margin-left: 30%;
                            margin-right: 30%;
                            margin-top: 10%;
                            margin-bottom: 1%;" type="submit" name="submit"><b>INPUT</b></button>
        </div>
    </form>




    <!-- Javascript Codes:  -->
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <!-- validation code from bootstrap website -->
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

    <!-- For Car Type  -->
    <script>
        function changeCarType(carType, dropdown1) {
            // Update the text of the button with the selected car type
            $(`#${dropdown1} .dropdown-toggle`).text(carType);
        }
    </script>


    <!-- For Fuel Type  -->
    <script>
        function changeFuelType(fuelType, dropdown2) {
            // Update the text of the button with the selected car type
            $(`#${dropdown2} .dropdown-toggle`).text(fuelType);
        }
    </script>



    
</body>
</html>
