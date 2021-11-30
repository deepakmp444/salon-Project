<?php

session_start();
if (isset($_SESSION['umob1'])) {
} else {
  header('location:index.php');
}
// unset($_SESSION['bid_session']);

$user = $_SESSION['umob1'];
$name = $_SESSION['name'];
$pwd = $_SESSION['pwd1'];

?>


<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon</title>
    <link rel="icon" href="image/logo.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
    .dropdown-item {
      padding-right: 5px;
    }
  </style>



</head>


<body>


<nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: #50446f;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top rounded" alt=""> Salon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="customer_index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">About</a>
          <!-- </li>
	 <li class="nav-item">
						 <a class="nav-link" href="contact.php" >Contact</a>

					 </li> -->

      </div>
    </div>
  </nav>

    <img src="image/theme.jpeg" alt="" class="img-fluid mt-5">

    <div class="container mb-5">

        <!-- <div class="row mt-5">
            <div class="col-sm-4">
                <img src="image/vinaySir.jpeg" alt="" class="img-fluid  rounded">
            </div>
            <div class="col-sm-8">
                <div class="card  mt-4 shadow">
                    <div class="card-body">
                        <h4 class="display-4 text-center"><a href="https://www.instagram.com/vinays986/" style="color: black;">Vinay Singh</a></h4>
                        <h5 class="text-right text-muted">– Software Developer</h5>
                        <h5 class="display-5 text-center mt-4 ">&ldquo;HAR SAMASYA KA HAL HAI, AAJ NAHI TO KAL HAI.&ldquo;.</h5>
                    </div>
                </div>

            </div>
        </div> -->

        <div class="row mt-5">

            <div class="col-sm-8 mt-5">
                <div class="card shadow mt-5">
                    <div class="card-body">
                        <h4 class="display-4 text-center mt-5"><a href="https://www.instagram.com/deepakmp444/" style="color: black;">Deepak Kumar</a></h4>
                        <h5 class="text-right text-muted">– Full Stack Web Developer</h5>
                        <h5 class="display-5 text-center mt-4">Be not afraid of going slowly, be afraid only of standing still.</h5>
                        <h5 class="text-right text-muted">– Chinese Proverb</h5>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="image/deepak3.jpeg" alt="Card image cap">

                </div>

            </div>
        </div>
    </div>


    <footer class="container-fluid  bg-dark  ">
        <div class="row">
            <div class='col-sm-12'>
                <br>
                <p class="text-center ">

                    <a href="https://www.instagram.com/deepakmp444/" style="color: black;"><b class="bg-white rounded">Deepak Kumar</b></a>

                </p>
            </div>
        </div>
    </footer>
</body>

</html>
