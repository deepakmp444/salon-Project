<?php

session_start();
if (isset($_SESSION['umob1'])) {
} else {
  header('location:index.php');
}


$user = $_SESSION['umob1'];
$name = $_SESSION['name'];

$bid = $_GET['bid'];

?>

<!-- Delete Service-->

<?php

if (isset($_GET['del'])) {
  $con = mysqli_connect('localhost', 'root', '', 'salon');
  $service_type = $_GET['del'];
  $sql = "DELETE FROM salon_tbl_view_request WHERE service_type='$service_type'";
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

  <!-- Custom styles for this template -->

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
          </li>

	 <!-- <li class="nav-item">
		<a class="nav-link" href="contact.php" >Contact</a>
	</li> -->

        </ul>
        <div class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profie</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Signed in as <br><b><?php echo $name; ?> </b> </a>
              <!-- <h6 class="text-center" style="cursor: pointer"></h6> -->
              <!-- <a class="dropdown-item" href="#">Mobile :<?php echo $user; ?></a> -->
              <a class="dropdown-item btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModalCenter2">Settings</a>
              <a href="logout.php" class="dropdown-item">Log Out</a>
            </div>
          </li>
        </div>
      </div>
    </div>
  </nav>

  <div class="jumbotron jumbotron-fluid shadow p-4 mt-5 bg-light" style="background-color: #f1f1f1;">
    <div class="container">
      <h1 class="text-center">Digital Salon</h1>
      <p class="text-center">Now You Can Book Salon from Home,Office and Any Place</p>
    </div>
  </div>


  <?php

  if ($_SESSION['role1'] === "customer") {

  ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 mt-1">

        </div>
        <div class="col-sm-8 mt-1 ">
          <div class="card shadow-sm bg-light">
            <div class="card-body">

              <div class="row">


                <?php
               $con = mysqli_connect('localhost', 'root', '', 'salon');
                $sql = "SELECT * FROM  salon_tbl_vendor_menu WHERE business_id='$bid'";

                $run = mysqli_query($con, $sql);

                while ($fetch = mysqli_fetch_assoc($run)) {
                ?>
                  <div class="col-sm-4">
                    <form action="" method="post">
                      <div class="card shadow-sm bg-white mt-3 mx-auto" style="width: 15rem;">
                        <div class="card-body">
                          <h5 class="card-title" >Menu Id : <?php echo $fetch['menuid']; ?></h5>
                          <h6 class="card-title">Service Name :<?php echo $fetch['service_type']; ?> </h6>
                          <input type="hidden" name="service_type" value="<?php echo $fetch['service_type']; ?>">
                          <!-- <input type="hidden" name="shop_name" value="<?php echo $fetch['shop_name']; ?>"> -->

                          <h6>Pay Rs. <?php echo $fetch['cost']; ?></h6>
                          <input type="hidden" name="bid" value=<?php echo $bid; ?>>
                          <button name="submit" class="btn btn-success">Send Request</button>
                        </div>
                      </div>
                    </form>
                  </div>

                <?php
                } //end while loop
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php
  } //end if
  ?>

  <br>

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




  <div>
    <?php

    if (isset($_POST['submit'])) {
      $con = mysqli_connect('localhost', 'root', '', 'salon');
      $user = $_SESSION['umob1']; //MUL Key
      $bid1 = $_POST["bid"]; //mull key Here is Problem, because of get variable;
      $service_type = $_POST['service_type'];
      // $shop_name = $_POST['shop_name'];

      $sql_u = "SELECT * FROM salon_tbl_view_request WHERE mobile_no='$user' AND service_type='$service_type' AND business_id ='$bid1'";
      $res_u = mysqli_query($con, $sql_u);
      if (mysqli_num_rows($res_u) > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("You have all ready select service");';
        // echo 'window.location = "customer_service_view.php";';
        echo '</script>';
      } else {
          $sql = "INSERT INTO `salon_tbl_view_request`(`mobile_no`, `business_id`, `service_type`) VALUES ('$user','$bid1','$service_type')";
        // echo $sql;
        $run = mysqli_query($con, $sql);
        // echo $run;
        // echo $run;
        if ($run == TRUE) {
          echo '<script type="text/javascript">';
          echo 'alert("Request Sent");';
          // echo 'window.location = "customer_service_view.php";';
          echo '</script>';
          // echo"inserted";
        } else {
          echo "Not Inserted";
        }
      }
    }

    ?>
  </div>

  <!-- Modal  Updating Profile-->
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
