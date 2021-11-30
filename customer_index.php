<?php

session_start();
if (isset($_SESSION['umob1'])) {
} else {
  header('location:index.php');
}

$user = $_SESSION['umob1'];
$name = $_SESSION['name'];
?>

<!-- Delete Service-->

<?php

if (isset($_GET['del'])) {
  $con = mysqli_connect('localhost', 'root', '', 'salon');
  $ts = $_GET['del'];
  $sql = "DELETE FROM salon_tbl_view_request WHERE ts='$ts' AND mobile_no = '$user'";
  $run = mysqli_query($con, $sql) or die("Not Deleted" . mysqli_error($con));
  if ($run) {

  } else {
    echo "Not deleted";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">
  <meta name="author" content="">

  <title>Salon</title>
  <link rel="icon" href="image/logo.png" type="image/icon type">



  <!-- Bootstrap  CSS -->
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

<body class="bg-light">

  <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: #50446f;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top rounded" alt=""> Salon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="customer_index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about_index.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter1" href="#">Status</a>
          <!-- </li>
		 <li class="nav-item">
						 <a class="nav-link" href="contact.php" >Contact</a>

					 </li> -->

        </ul>
        <div class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profie</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Signed in as <br><b><?php echo $name; ?> </b> </a>
              <a class="dropdown-item btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModalCenter2">Settings</a>
              <a href="logout.php" class="dropdown-item">Log Out</a>
            </div>
          </li>

        </div>
      </div>
    </div>
  </nav>

  <div class="jumbotron jumbotron-fluid shadow-sm p-4 mt-5 bg-light">
    <div class="container">
      <h1 class="text-center">Digital Salon</h1>
      <p class="text-center">Now You Can Book Salon from Home,Office and Any Place </p>
    </div>
  </div>


  <?php

  if ($_SESSION['role1'] === "customer") {

  ?>

    <div class="container-fluid">


      <div class="row">
        <div class="col-sm-2 mt-1">
          <!-- blank -->
        </div>
        <div class="col-sm-8 mt-1">
          <!-- <div class="card shadow-lg bg-light">
          <div class="card-body"> -->

          <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search : Enter Address/Shop Name" id="search_text" name="search">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit" name="submit">Go</button>
              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-sm-12">

              <?php
              if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                $con = mysqli_connect('localhost', 'root', '', 'salon');

                $sql = "SELECT * FROM  salon_tbl_business WHERE address LIKE '%$search%' OR shop_name LIKE '%$search%'";
                $run = mysqli_query($con, $sql);

                if (mysqli_num_rows($run) <= 0) {
                  echo '<script type="text/javascript">';
                  echo 'alert("No Data Found");';

                  echo '</script>';
                } else {

                  while ($fetch = mysqli_fetch_assoc($run)) {
              ?>
                    <div class="card mt-1 shadow-sm bg-light" id="table-data">
                      <h5 class="card-header">Shop Name :<b> <?php echo $fetch['shop_name']; ?></b> </h5>
                      <div class="card-body">
                        <h5 class="card-title">Address : <b> <?php echo $fetch['address']; ?> </b> </h5>
                        <p class="card-text">Business Id : <?php echo $fetch['business_id']; ?></p>
                        <p class="card-text"></p>

                        <div class="d-flex justify-content-between">
                          <div class="p-2"><a href="customer_service_view.php?bid=<?php echo $fetch['business_id']; ?>" class="btn btn-primary"> See Services</a></div>
                          <div class="p-2"><i class="fa fa-gittip text-right" style="font-size:30px;color:red"></i></div>
                        </div>
                      </div>
                    </div>
                    <hr class="bg-success">

              <?php

                  } //end while loop
                }
              }
              ?>


            </div>
          </div>
        </div>
        <div class="col-sm-2 mt-1">
          <!-- <div class="card shadow-sm bg-white">
            <div class="card-body">
              advertisement
            </div>
          </div> -->
        </div>
      </div>
    </div>

  <?php
  } //end if
  ?>




  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> <b style="color: green;">Status</b> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Business Id</th>
                  <th scope="col">Service Name</th>
                  <th scope="col">Status</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $con = mysqli_connect('localhost', 'root', '', 'salon');
                  $sql = "SELECT * FROM  salon_tbl_view_request WHERE mobile_no='$user'";
                  // $sql = " SELECT salon_tbl_business.shop_name, salon_tbl_business.business_id, salon_tbl_view_request.service_type, salon_tbl_view_request.status from salon_tbl_business NATURAL JOIN salon_tbl_view_request where salon_tbl_view_request.mobile_no = '$user'";

                  $run = mysqli_query($con, $sql);
                  
                  while ($fetch = mysqli_fetch_assoc($run)) {
                  ?>
                    <!-- <td>...</td> -->
                    <td><?php echo $fetch['business_id'] ?></td>
                    <!-- <td><?php echo $fetch['shop_name'] ?></td> -->
                    <td><?php echo $fetch['service_type'] ?></td>
                    <td><?php echo $fetch['status'] ?></td>
                    <td>
                      <form>
                        <a href="customer_index.php?del=<?php echo $fetch['ts'] ?>" class="btn btn-samll btn-danger">Clear</a>
                      </form>
                    </td>
                </tr>
              <?php
                  } //end while loop
              ?>
              <tr>
              </tbody>
            </table>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>







  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Profile </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="profile.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required value="<?php echo $_SESSION['name']; ?>">
              <div class="valid-feedback">Valid.</div>

            </div>
            <div class="form-group">
              <label for="username">Mobile No :</label>
              <input type="digit" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile" required value="<?php echo $_SESSION['umob1']; ?>">
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
              <div class="valid-feedback">Valid.</div>
            </div>
            <!-- <div class="form-group">
              <label for="secret"> Secret Keyword for Recovery Password</label>
              <input type="text" class="form-control" id="secret" placeholder="Enter Secret Keyword for recovery Password" name="secret" required>
              <div class="valid-feedback">Valid.</div>
            </div> -->

            <div>
              <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-warning d-flex justify-content-end" name="submit">Update</button>
                <button type="button" class="btn btn-danger d-flex justify-content-start" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



</body>

</html>
