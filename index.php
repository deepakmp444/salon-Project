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
</head>

<style>

  .signup {
    margin-top: 50px;
  }

  #b1{
    color: red;
  }

</style>

<body>


	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #50446f;">
		 <div class="container">
			 <a class="navbar-brand" href="#">
      <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top rounded" alt=""> Salon</a>
			 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
				 <span class="navbar-toggler-icon"></span>
			 </button>

			 <div class="collapse navbar-collapse" id="navbarsExample07">
				 <ul class="navbar-nav mr-auto">
					 <li class="nav-item active">
						 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
   					 <li class="nav-item">
						 <a class="nav-link" href="about.php" >About</a>

					 </li>

					 <!-- <li class="nav-item">
						 <a class="nav-link" href="contact.php" >Contact</a>

					 </li> -->
				 </ul>
			 </div>
		 </div> 
     
	 </nav>

  <div class="container ">
    <div class="row">
			<div class="col-sm-8">
        <div class="jumbotron bg-white text-center">
          <h1 class="display-2">Digital Salon</h1>
          <h5>
            You can save your <b id="b1">TIME</b> by only one Click.
            </h5><br>
              <div class="row">
                <div class="col-sm-12">
                  <img src="image/cover.jpg" height="250" width="300" class="mx-auto d-block img-thumbnail img-fluid">
                </div>
              </div>
        </div>
      </div>

      <div class="col-sm-4 signup">

            <div class="shadow-lg p-3 mb-5 rounded bg-white">
              <img src="image/Login.png" width="180" height="100" class=" mx-auto d-block rounded" alt="PUBG">
              <h2 class="text-center">Log In</h2>
              <hr class="bg-danger">

              <form action="login.php" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                  <label for="mobile_no">Mobile No :</label>
                  <input type="text" class="form-control" id="mobile_no" placeholder="Enter Mobile Number" name="mobile_no" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

            <div class="row">
               <div class="col-sm-12">
                      <button type="submit" value="Login" class="btn btn-primary btn-block" name="submit">Sign
                        In</button>
                        <a href="#">Forget Password</a>
                </div>
              </form>



                 <div class="col-sm-12">
                        <!-- Button to Open the Modal -->
                              <button type="button" class="btn btn-success  btn-block " data-toggle="modal" data-target="#myModal">
                              Create New Account
                              </button>

                              <!-- The Modal -->
                              <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                  <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">New Account</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <form action="signup.php" method="POST" class="needs-validation" novalidate>
                                          <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                                            <div class="valid-feedback">Valid.</div>

                                          </div>
																					<div class="form-group">
													                  <label for="username">Mobile No :</label>
													                  <input type="digit" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" required>
													                  <div class="valid-feedback">Valid.</div>
													                  <div class="invalid-feedback">Please fill out this field.</div>
													                </div>
                                          <div class="form-group">
                                            <label for="password1">Password:</label>
                                            <input type="password" class="form-control" id="password1" placeholder="Enter password" name="password" required>
                                            <div class="valid-feedback">Valid.</div>
                                          </div>
																					<label for="sel1">Role:</label>
																			      <select class="form-control" id="sel1" name="sellist1">
																			        <option value="customer">Customer</option>
																			        <option value="vendor">Vendor</option>
																			      </select>
                                        <div>
                                            <div class="d-flex justify-content-between mt-3">
                                              <button type="submit" class="btn btn-primary d-flex justify-content-end" name="submit">Sign
                                                Up</button>
                                              <button type="button" class="btn btn-danger d-flex justify-content-start" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                  </div>
            </div>
        </div>
    </div>
  </div>
</div><!-- end container -->

<footer class="container-fluid  bg-dark fixed-bottom ">
    <div class="row">
      <div class='col-sm-12'>
        <br>
        <p class="text-center ">

        <a href="https://www.instagram.com/vinays986/" style="color: black;" ><b class="bg-white rounded">Digital Salon</b></a>
          
        </p>
      </div>
    </div>
  </footer>



    <script>
      // Disable form submissions if there are invalid fields
      (function () {
        'use strict';
        window.addEventListener('load', function () {
          // Get the forms we want to add validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>



</body>

</html>
