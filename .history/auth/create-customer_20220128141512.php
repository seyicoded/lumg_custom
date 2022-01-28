<?php 
    // just simple auth
    require '../config/index.php';
    $config = new config();
    $con = $config->database();

    include '../security.php';
    if(!$auth){
        die('');
        return '';
    }

    echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM wpdc_users"));
?>