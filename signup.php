<div>
  <?php



  if (isset($_POST['submit'])) 
  {
    $con = mysqli_connect('localhost', 'root', '', 'salon');

    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $password =$_POST['password']; 
    $user_type = $_POST["sellist1"];

      $sql_u="SELECT * FROM salon_tbl_registration WHERE  mobile_no='$mobile'";
      $res_u = mysqli_query($con,$sql_u);
      if(mysqli_num_rows($res_u) > 0)
      {
        echo '<script type="text/javascript">';
        echo 'alert("User Name Already Exist \n use new Mobile Number");';
        echo 'window.location = "index.php";';
        echo '</script>';

      }else
      {

        $sql = "INSERT INTO `salon_tbl_registration`(`name`, `mobile_no`, `pwd`, `role`, `regdate`) VALUES ('$name','$mobile','$password','$user_type',sysdate())";

        $run = mysqli_query($con, $sql);
        if ($run == TRUE)
        {
          echo '<script type="text/javascript">';
          echo 'alert("Registered");';
          echo 'window.location = "index.php";';
          echo '</script>';
        } else 
        {
          echo "Not Inserted";
        }

      }




    

  }

  ?>

</div>
