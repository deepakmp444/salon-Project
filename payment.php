<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>
    <div class="card" style="width: 18rem;">
        <img src="./image//cover.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <form action="" method="post">
                <h5 class="card-title">Item</h5>
                <p class="card-text">Item description</p>
                <button  class="btn btn-primary">Pay Rs 150</button>
            </form>
        </div>


        INSERT INTO `salon_tbl_payment`(`item`, `price`) VALUES ([value-1],[value-2])


        <?php



        if (isset($_POST['submit'])) {
            $con = mysqli_connect('localhost', 'root', '', 'salon');

            $name = $_POST["name"];
            $mobile = $_POST["mobile"];
            $password = $_POST['password'];
            $user_type = $_POST["sellist1"];

            $sql_u = "SELECT * FROM salon_tbl_registration WHERE  mobile_no='$mobile'";
            $res_u = mysqli_query($con, $sql_u);
            if (mysqli_num_rows($res_u) > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("User Name Already Exist \n use new Mobile Number");';
                echo 'window.location = "index.php";';
                echo '</script>';
            } else {

                $sql = "INSERT INTO `salon_tbl_registration`(`name`, `mobile_no`, `pwd`, `role`, `regdate`) VALUES ('$name','$mobile','$password','$user_type',sysdate())";

                $run = mysqli_query($con, $sql);
                if ($run == TRUE) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Registered");';
                    echo 'window.location = "index.php";';
                    echo '</script>';
                } else {
                    echo "Not Inserted";
                }
            }
        }

        ?>
    </div>
</body>

</html>