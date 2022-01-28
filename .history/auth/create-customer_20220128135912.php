<?php 
    // just simple auth
    require '../config/index.php';
    $config = new config();
    $con = $config->database();

    require '../security.php';

    echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM wpdc_users"));
?>