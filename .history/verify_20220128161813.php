<?php 
    // just simple auth
    require './config/index.php';
    $config = new config();
    $con = $config->database();

    $email = base64_decode($_REQUEST['l']);

    // get data
    $data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM custom_holder_registration WHERE email = '$email'"));

    $data = json_decode($data['data'], true);

    // prepare to send cURL request for registration
?>