<?php

session_start();
if (isset($_SESSION['umob1'])) {
} else {
  header('location:index.php');
}
// unset($_SESSION['bid_session']);

$user = $_SESSION['umob1'];
$name = $_SESSION['name'];


?>


<div>
  <?php
  if (isset($_POST['submit'])) 
  {
    $con = mysqli_connect('localhost', 'root', '', 'salon');

    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];

    $sql = " UPDATE salon_tbl_registration SET  
    name = '$name',
    mobile_no ='$mobile', 
    pwd='$password'
    WHERE mobile_no='$_SESSION[umob1]'";
    echo $sql;
        $run = mysqli_query($con, $sql) or die("Not Update".mysqli_error($con));
        if ($run == TRUE)
        {
          echo '<script type="text/javascript">';
          echo 'alert("Updated");';
          echo 'window.location = "customer_index.php";';
          echo '</script>';
        } else 
        {
          echo "Not Update";
        }   

  }

  ?>

</div>
