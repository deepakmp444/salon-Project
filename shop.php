<?php

session_start();
if (isset($_SESSION['umob1'])) {
} else {
  header('location:index.php');
}
// $con = mysqli_connect("localhost", "root", "", "salons");
// $bid = $_POST['busid'];
// $shop = $_POST['shop'];


$user = $_SESSION['umob1'];
$name = $_SESSION['name'];

?>

<?php

if (isset($_GET['del'])) {
  $con = mysqli_connect('localhost', 'root', '', 'salon');
  $business_id = $_GET['del'];
  $user = $_SESSION['umob1'];
  //$menu_id = $_GET['menu_id'];
  $sql = "DELETE FROM salon_tbl_business WHERE  mobile_no='$user' AND business_id='$business_id' ";
  // echo $sql;
  $run = mysqli_query($con, $sql) or die("Not Deleted" . mysqli_error($con));
  if ($run) {
    //echo "Deleted";
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
  <link href="offcanvas.css" rel="stylesheet">

</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #50446f;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="image/logo.png" width="30" height="30" class="d-inline-block align-top rounded" alt=""> Salon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="vendor_index.php">Home <span class="sr-only">(current)</span></a>
          </li>
         

          <?php

          if ($_SESSION['role1'] === "vendor") {

          ?>
            <li class="nav-item active">
              <a class="nav-link active" href="shop.php">Shop Section</a>
            </li>
          <?php
          } //end if
          ?>

          <li class="nav-item">
            <a class="nav-link" href="vendor_about.php">About</a>
          </li>
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

  if ($_SESSION['role1'] === "vendor") {

  ?>

    <div class="container my-4">
      <div class="border border-light p-3 mb-4">
        <div class="text-center">
          <button type="button" class="btn  btn-lg btn-success" data-toggle="modal" data-target="#myModal">
            Add Shop
          </button>

          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-md">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Adding Shop</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-left">
                  <form action="#" method="POST">
                    <div class="form-group">
                      <label for="busi_reg">Business Registration</label>
                      <input type="text" class="form-control" id="busi_reg" name="busi_reg" placeholder="Enter Business Registration" required>
                    </div>
                    <div class="form-group">
                      <label for="shop_name">Shop Name</label>
                      <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Enter Shop Name" required>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                      <label for="establish">Establish Date</label>
                      <input type="text" class="form-control" id="establish" name="establish" placeholder="Enter Establish Date " required>
                    </div>
                    <div class="d-flex justify-content-between ">
                      <button type="submit" class="btn btn-primary d-flex justify-content-end" name="submit">Submit</button>
                      <button type="button" class="btn btn-danger d-flex justify-content-start" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="row">

        <?php
        $con = mysqli_connect('localhost', 'root', '', 'salon');
        $_SESSION['bid_session'] = null;
        $sql = "SELECT * FROM  salon_tbl_business WHERE mobile_no ='$user'";
        $run = mysqli_query($con, $sql);
        //  +-----------+-------------+-----------+--------------+------------+
        //  | mobile_no | business_id | shop_name | address      | est_date   |
        //  +-----------+-------------+-----------+--------------+------------+
        while ($fetch = mysqli_fetch_assoc($run)) {
        ?>
          <div class="col-sm-4 mt-3 mb-5">
            <div class="card shadow">
              <h5 class="card-header">Business Registration :<b> <?php echo $fetch['business_id']; ?></b> </h5>
              <div class="card-body">
                <h5 class="card-title">Shop Name : <b><?php echo $fetch['shop_name']; ?></b> </h5>
                <p class="card-text">Address : <b><?php echo $fetch['address']; ?> </b> </p>
                <p class="card-text">Establish Date : <b><?php echo $fetch['est_date']; ?> </b> </p>
                <div class="d-flex justify-content-around">
                  <div><a href="shop_service.php?bid=<?php echo $fetch['business_id']; ?>" class="btn btn-small btn-success">Shop Service</a>
                  </div>
                  <div>
                    <a href="<?php $_SERVER['PHP_SELF'] ?>?del=<?php echo $fetch['business_id'] ?>" class="btn btn-samll btn-danger">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        } //end while loop
        ?>

      </div>
    </div>

  <?php
  } //end if
  ?>

  <div>
    <?php



    if (isset($_POST['submit'])) {
      $con = mysqli_connect('localhost', 'root', '', 'salon');
      $user = $_SESSION['umob1']; //MUL Key
      $busi_reg = $_POST["busi_reg"];
      $shop_name = $_POST["shop_name"];
      $address = $_POST["address"];
      $establish = $_POST["establish"];

      $sql_u = "SELECT * FROM salon_tbl_business WHERE business_id='$busi_reg'";
      $res_u = mysqli_query($con, $sql_u);
      if (mysqli_num_rows($res_u) > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("Business Registration Number Already Exist \n Enter Your Own Business Registration Number");';
        echo 'window.location = "shop.php";';
        echo '</script>';
      } else {
        $sql = "INSERT INTO `salon_tbl_business`(`mobile_no`, `business_id`, `shop_name`, `address`, `est_date`) VALUES ('$user','$busi_reg','$shop_name','$address','$establish')";

        $run = mysqli_query($con, $sql);


        if ($run == TRUE) {
          echo '<script type="text/javascript">';
          echo 'alert("Added Shop");';
          echo 'window.location = "shop.php";';
          echo '</script>';
        } else {
          echo "Not Inserted";
        }
      }
    }

    ?>

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
        Go To Home Page
        </div>
      </div>
    </div>
  </div>


</body>

</html>
