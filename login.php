<div>
    <?php

    session_start();

    $con = mysqli_connect('localhost', 'root', '', 'salon');

    if (isset($_POST['submit'])) {
      $mobile_no = $_POST['mobile_no'];
      $password = $_POST['password']; 

      $sql = "SELECT * FROM salon_tbl_registration WHERE mobile_no ='$mobile_no' AND pwd='$password' ";

    //  $sql1 = "SELECT * FROM salons.tbl_business WHERE mobile_no ='$mobile_no' ";

      $query = mysqli_query($con, $sql);

     // $query2 = mysqli_query($con, $sql1);

      $row = mysqli_fetch_assoc($query);
     // $regdate = $row['regdate'];
     // $row1 = mysqli_fetch_assoc($query2);

     // $business_id = $row1['business_id'];
      //echo "<script>alert($business_id); </script>";
      $umob = $row['mobile_no'];
      $name = $row['name'];
      $pwd = $row['pwd'];
      $role = $row['role'];
      

      //echo "<script>alert($regdate); </script>";


      if ($umob == $mobile_no && $pwd == $password) {
       // $_SESSION['regdate'] = $regdate;
        $_SESSION['name'] = $name;
        $_SESSION['umob1'] = $umob;
        $_SESSION['role1'] = $role;
        $_SESSION['pwd1']=$pwd;

       // $_SESSION['business_id'] = $business_id;
        //$_SESSION['regdate'] = $regdate;
        // echo $umob1;
        // echo $role1;

        if ($role === "vendor") {

          echo '<script type="text/javascript">';
          echo 'alert("Login Sucess Fully");';

          echo 'window.location = "vendor_index.php";';
          echo '</script>';

        } else if ($role === "Admin") {
          echo "Admin Login";

        } else if ($role === "customer") {
          echo '<script type="text/javascript">';
          echo 'alert("Login Sucess Fully");';
          echo 'window.location = "customer_index.php";';
          echo '</script>';

        }

      } else {
        echo '<script type="text/javascript">';
        echo 'alert("User Name And Password Not Matched");';
        echo 'window.location = "index.php";';
        echo '</script>';

      }
    }
    ?>
  </div>
