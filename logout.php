<?php
session_start();
session_destroy();

// header('location:index.php');

        echo '<script type="text/javascript">';
        echo 'alert("Log Out Success Fully");';
        echo 'window.location = "index.php";';
        echo '</script>';


?>
