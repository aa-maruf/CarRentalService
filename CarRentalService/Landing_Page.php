<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Title Change -->
    <title>Car Rental Service</title>
    <link rel="stylesheet" href="./bootstrap-5.3.2-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="main.css"/>
    

</head>
<body style="background-color: black; padding: 0%; margin: 0%;">

    <!-- navigation part -->
    <nav class="navbar navbar-expand-lg fixed-top text-uppercase" >
        <div class="container-fluid" style="padding-left: 5%; padding-right: 3%; ">
          <a class="navbar-brand nav-logo" href="#"><b>C.R.S</b></a>
  
  
          <!-- menu bar toggle : not working properly -->
          <!-- <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
          </button> -->

          
  
          <div class="collapse navbar-collapse " id="navbarSupportedContent" style="text-align:center; padding-left: 5%; padding-top: 3%;">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link px-lg-4 rounded"
                          aria-current="page"
                          href="#">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link px-lg-4 rounded"
                          href="#aboutMe">Contact</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link px-lg-4 rounded"
                          href="#skills">Cars</a>
                  </li>
                  <li class="nav-item" style="margin-right: 10%;">
                      <a class="nav-link px-lg-4 rounded"
                          href="#">Reviews</a>
                  </li>
              </ul> 
          </div>

          

            <div >
                <button style="color: white;" type="button" onclick="location.href='User_Sign_In.php'">Sign In</button>
            </div>
        </div>
      </nav>


    
    <!-- Heading Hi  -->
    <section class="main py-5">
        <div class="container py-5" ">
          <div class="row py-5">
            <div class="col-lg-6 py-5" >
              <h3 >
                <span style="font-size: 60%;">Hi,Welcome to </span><br />
                <b> <span style="color:#fb8500">Car Rental Service</span></b>
              </h3>
              <h6 >For making your Journey Easier.</h6>


                <div class="dropdown">
                    <button style="color: white;" class="dropdown-toggle " type="button" data-bs-toggle="dropdown" >
                        Login
                    </button>
                    <ul class="dropdown-menu" >
                        <li><a class="dropdown-item" href="User_Login.php">User</a></li>
                        <li><a class="dropdown-item" href="Driver_Login.php">Driver</a></li>
                        <li><a class="dropdown-item" href="Admin_Login.php">Admin</a></li>
                    </ul>
                </div>
            </div> 
          </div>
        </div>
    </section>




    <div class="container-fluid" style="padding-left:10%; background-color: #03071e;">
        <footer class="py-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h4 style="font-weight:100%; color: white">Links</h4>
                    <ul class="nav-item mb-2">
                        <a style="color:#fb8500;" href="landing_page.php">Home</a>
                    </ul>
                    <ul class="nav-item mb-2">
                        <a style="color:#fb8500;" href="landing_page.php">Contact</a>
                    </ul>
                    <ul class="nav-item mb-2">
                        <a style="color:#fb8500;" href="landing_page.php">Cars</a>
                    </ul>
                    <ul class="nav-item mb-2">
                        <a style="color:#fb8500;" href="landing_page.php">Reviews</a>
                    </ul>

                </div>


                <div class="col-6 col-md-2 mb-3">
                    <h4 style="font-weight:100%; color: white">Contacts</h4>
                    <ul class="nav-item mb-2" style="margin-bottom: 5%;">
                        <h6 style="color:#fb8500;">Phone Number: <span style="font-size: small; color:blanchedalmond">01633800157, 01533671585</span> </h6>
                    </ul>

                    <ul class="nav-item mb-2" style="margin-bottom: 5%;">
                        <h6 style="color:#fb8500;">Email: <br><span style="font-size: small; color:blanchedalmond">tawsif@gmail.com <br> maruf@gmail.com</span> </h6>
                    </ul>

                    <ul class="nav-item mb-2" style="margin-bottom: 2%;">
                        <h6 style="color:#fb8500;">Address: <br><span style="font-size: small; color:blanchedalmond">Building #5, Road #5, Senpara Parbata <br>Mirpur-10, Dhaka, Bangladesh.</span> </h6>
                    </ul>
                </div>

                <div class="col-6 ">
                    <h4 style=" margin-left:10%; font-weight:100%; color: white">Your Feedback</h4>
                    <div class="row g-3 " style="padding-left: 10%; padding-right: 10%; ">

                        <div class="col-6 " style="padding-bottom: 2%;">
                        <input type="text" class="form-control comments_part" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col-6">
                        <input type="text" class="form-control comments_part" placeholder="Last name" aria-label="Last name">
                        </div>
                        <div class="col-12" style="padding-bottom: 2%;">
                        <input type="text" class="form-control comments_part" placeholder="Email" aria-label="Email">
                        </div>
                        <div class="col">
                        <textarea class="form-control comments_part" id="exampleFormControlTextarea1" placeholder="Your Message" rows="3"></textarea>
                        </div>


                    </div>
                </div>
            </div>
        </footer>
    </div>







      <!-- javascript -->
      <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    
</body>
</html>