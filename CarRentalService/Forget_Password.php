<!-- 
    PHP Code Will be Here...
 -->



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>Forget Password</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css" />

</head>
<body style="background-color: black; padding: 0%; margin: 0%;">

    <!-- navigation part -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" style="padding-top: 2%; ">
        <div class="container-fluid" style="padding-left: 5%; padding-right: 3%; ">
            <a class="navbar-brand nav-logo" ><b>C.R.S</b></a>
        </div>
    </nav>





    <!-- Sign In Heading -->
    <div class="container" style="text-align: center">
        <h1 style="color: #fb8500;" class="heading-for-login">Password Reset</h1><br>
        <h6 style="color: white;">Enter and Check Your E-mail for Passowrd.</h6>
    </div>
    


    <!--Sign In box Starts here-->
    <form class="needs-validation container sign-up-back"  method="post" novalidate>

        <div style="margin-bottom: 5%;"> <!-- Email -->
            
            <label for="email" class="form-label" style="margin-bottom: 5%;">Email address</label><br>
            <input type="email" class="form-control input-design" id="email" placeholder="name@example.com" required>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">
                Please choose a valid Email.
            </div>
        </div> 
            
        <div > <!--Button-->
            <button style="margin-left: 30%;
                            margin-right: 30%;
                            margin-top: 10%;"
                    type="submit">Confirm</button>
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