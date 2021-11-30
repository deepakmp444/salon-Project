<?php

session_start();
if (isset($_SESSION['umob1'])) {
} else {
    header('location:index.php');
}

$user = $_SESSION['umob1'];
$name = $_SESSION['name'];

//$_SESSION['$bid_session']=null;
if ($_SESSION['bid_session'] == null) {
    $bid = $_GET['bid'];
    $_SESSION['bid_session'] = $bid;
} else
    $bid = $_SESSION['bid_session'];

//echo $bid;
?>

<!-- deleting service -->

<?php

if (isset($_GET['del'])) {
    $con = mysqli_connect('localhost', 'root', '', 'salon');
    $menu_id = $_GET['del'];
    $bid1 = $_SESSION['bid_session']; // i Have to Understand $bid1 kaha se aya raha hai.


    //echo $menu_id.$bid1.$bid;
    $sql = "DELETE FROM salon_tbl_vendor_menu WHERE menuid='$menu_id' AND business_id='$bid1'";
    //echo $sql;
    $run = mysqli_query($con, $sql) or die("Not Deleted" . mysqli_error($con));
    if ($run) {
        // echo "Deleted";


        // echo '<script type="text/javascript">';
        // echo 'alert("Deleted");';
        // echo 'window.location = "shop_service.php";';
        // echo '</script>';
    }
}
?>


<!-- Decline Service-->

<?php

if (isset($_GET['del1'])) {
    $con = mysqli_connect('localhost', 'root', '', 'salon');
    $service_type = $_GET['del1'];
    $sql = "DELETE FROM salon_tbl_view_request WHERE service_type='$service_type'";
    //echo $sql;
    $run = mysqli_query($con, $sql) or die("Not Deleted" . mysqli_error($con));
    echo $run;
    if ($run) {
        echo "Deleted";


        // echo '<script type="text/javascript">';
        // echo 'alert("Deleted");';
        // echo 'window.location = "recentAdded.php";';
        // echo '</script>';
    } else {
        echo "Not deleted";
    }
}
?>

<!-- update -->
<?php

if (isset($_POST['submit2'])) {
    $con = mysqli_connect('localhost', 'root', '', 'salon');
    $service_type = $_POST['service_type'];
    $business_id = $_POST['business_id'];


    $sql = "UPDATE salon_tbl_view_request
    SET status = 'Accepted'
    WHERE service_type ='$service_type' AND business_id='$business_id';";
    //echo $sql;
    $run = mysqli_query($con, $sql) or die("Not Update" . mysqli_error($con));
    // echo $run;
    if ($run) {
    } else {
        echo "Not Update";
    }
}
?>

<?php

if (isset($_POST['submit3'])) {
    $con = mysqli_connect('localhost', 'root', '', 'salon');
    $service_type = $_POST['service_type'];
    $business_id = $_POST['business_id'];


    $sql = "UPDATE salon_tbl_view_request
    SET status = 'Decline'
    WHERE service_type ='$service_type' AND business_id='$business_id';";
    //echo $sql;
    $run = mysqli_query($con, $sql) or die("Not Update" . mysqli_error($con));
    // echo $run;
    if ($run) {
    } else {
        echo "Not Update";
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
    <!--  <link href="offcanvas.css" rel="stylesheet">
 -->
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
                    <li class="nav-item">
                        <a class="nav-link" href="vendor_index.php">Home <span class="sr-only">(current)</span></a>
                    </li>


                    <?php

                    if ($_SESSION['role1'] === "vendor") {

                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="shop.php">Shop Section</a>
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
            <?php $x = date("Y-m-d"); ?>
            <?php echo $x; ?>

            <p class="text-center">Now You Can Book Salon from Home,Office and Any Place </p>
        </div>
    </div>

    <?php

    if ($_SESSION['role1'] === "vendor") {

    ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'salon');
                    //$bid = $_GET['bid'];
                    $sql = "SELECT * FROM  salon_tbl_business WHERE mobile_no ='$user' AND business_id='$bid'";
                    $run = mysqli_query($con, $sql);
                    //  +-----------+-------------+-----------+--------------+------------+
                    //  | mobile_no | business_id | shop_name | address      | est_date   |
                    //  +-----------+-------------+-----------+--------------+------------+

                    while ($fetch = mysqli_fetch_assoc($run)) {
                    ?>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Business Registration</th>
                                        <th>Shop Name</th>
                                        <th>address</th>
                                        <th>Establish Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fetch['business_id']; ?></td>
                                        <td><?php echo $fetch['shop_name']; ?></td>
                                        <td><?php echo $fetch['address']; ?></td>
                                        <td><?php echo $fetch['est_date']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    <?php
                    } //end while loop
                    ?>

                </div>
            </div>
        </div>

        <div class="container my-4">
            <div class="border border-light p-3 mb-4">
                <div class="text-center">
                    <button type="button" class="btn  btn-lg btn-success" data-toggle="modal" data-target="#myModal">
                        Add Services
                    </button>
                    <button type="button" class="btn  btn-lg btn-warning" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                        People Requested
                    </button>



                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">

                                    <div class="table-responsive">



                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Mobile Number</th>
                                                    <th scope="col">Service Name</th>
                                                    <th scope="col">Create On Date</th>
                                                    <th scope="col">Request</th>
                                                    <th scope="col">Accept</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    $con = mysqli_connect('localhost', 'root', '', 'salon');
                                                    $sql = "SELECT * FROM  salon_tbl_view_request WHERE business_id='$bid' AND (status = 'Accepted' OR status = 'Waiting') ";
                                                    $run = mysqli_query($con, $sql);


                                                    while ($fetch = mysqli_fetch_assoc($run)) {
                                                    ?>
                                                        <th>... </th>
                                                        <td><?php echo $fetch['mobile_no'] ?></td>

                                                        <form action="#" method="POST">
                                                            <td><?php echo $fetch['service_type'] ?></td>
                                                            <input type="hidden" name="service_type" value="<?php echo $fetch['service_type'] ?>">
                                                            <td><?php echo $fetch['ts'] ?></td>
                                                            <td><?php echo $fetch['status'] ?></td>
                                                            <input type="hidden" name="business_id" value="<?php echo $fetch['business_id'] ?>">
                                                            <td>

                                                                <button type="submit" name="submit2" class="btn btn-success">Accept</button>
                                                        <!-- </form> -->
                                                        </td>

                                                        <td>
                                                        <button type="submit" name="submit3" class="btn btn-danger">Decline</button>
                                                            <!-- <form>
                                                                <a href="shop_service.php?del1=<?php echo $fetch['service_type'] ?>" class="btn btn-samll btn-danger">Decline</a>
                                                            </form> -->
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

                        <!-- The Modal for adding service -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Adding Service</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body text-left">

                                        <form action="#" method="POST">
                                            <div class="form-group">
                                                <label for="menu_id">Menu ID</label>
                                                <input type="text" class="form-control" id="menu_id" name="menu_id" placeholder="Enter Menu ID" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="service_type">Service Type</label>
                                                <input type="text" class="form-control" id="service_type" name="service_type" placeholder="Enter Service type" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                                            </div>
                                            <input type="hidden" name="bid" value=<?php echo $bid; ?>>

                                            <!-- <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="img" accept="image/*" required>
                                        <label class="custom-file-label" for="customFile">Add Photo</label>
                                    </div> -->
                                            <div class="d-flex justify-content-between mt-3">
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
                    <div class="col-sm-12">
                        <div class="row">
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'salon');
                            $sql = "SELECT * FROM  salon_tbl_vendor_menu WHERE mobile_no ='$user' AND business_id='$bid'";
                            $run = mysqli_query($con, $sql);

                            while ($fetch = mysqli_fetch_assoc($run)) {
                            ?>

                                <div class="col-sm-4">
                                    <div class="card shadow ml-auto mr-auto mb-5" style="width: 15rem;">

                                        <div class="card-body">
                                            <h4 class="card-title">Menu Id :<?php echo $fetch['menuid']; ?> </h4>
                                            <p class="card-text">Service type :<?php echo $fetch['service_type']; ?> </p>
                                            <h6>Price : Rs <?php echo $fetch['cost']; ?></h6>

                                            <div class="d-flex justify-content-around mt-3">
                                                <div>
                                                    <form>

                                                        <a href="shop_service.php?del=<?php echo $fetch['menuid'] ?>" class="btn btn-samll btn-danger">Delete</a>
                                                    </form>
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
                </div>
            </div>




        <?php
    } //end if
        ?>




        <div>
            <?php



            if (isset($_POST['submit'])) {
                $con = mysqli_connect('localhost', 'root', '', 'salon');
                // $bid1 = $POST['bid'];
                $menu_id = $_POST["menu_id"];
                $service_type = $_POST["service_type"];

                $price = $_POST["price"];
                $user = $_SESSION["umob1"];
                $bid1 = $_POST["bid"];

                // $img = $_FILES['img']['name'];
                // $simg = $_FILES['img']['tmp_name'];
                // move_uploaded_file($simg, "pics/" . $img);


                $sql_u = "SELECT * FROM salon_tbl_vendor_menu WHERE mobile_no='$user' AND menuid='$menu_id'";
                $res_u = mysqli_query($con, $sql_u);
                if (mysqli_num_rows($res_u) > 0) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Menu Id Already Exist \n Enter New Menu Id");';
                    echo 'window.location = "shop_service.php";';
                    echo '</script>';
                } else {


                    $sql = "INSERT INTO `salon_tbl_vendor_menu`(`menuid`, `service_type`, `cost`, `mobile_no`, `business_id`)  VALUES ('$menu_id','$service_type','$price','$user','$bid1')";

                    $run = mysqli_query($con, $sql);
                    //echo "<script>alert($bid1); </script>";
                    // echo $bid1;
                    // echo $sql;
                    // echo $run;

                    if ($run == TRUE) {

                        echo '<script type="text/javascript">';
                        echo 'alert("Uploaded");';
                        echo 'window.location = "shop_service.php";';

                        echo '</script>';
                    } else {

                        echo '<script type="text/javascript">';
                        echo 'alert(" Menu Id Try With Your Business Reg \n eg. Business reg ->B0001_MenuId");';
                        echo 'window.location="shop_service.php";';
                        echo '</script>';
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
