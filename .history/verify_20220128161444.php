<?php 
    // just simple auth
    require './config/index.php';
    $config = new config();
    $con = $config->database();

    $email = base64_decode($_REQUEST['l']);
?>