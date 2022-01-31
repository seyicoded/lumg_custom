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

    // login

    try {
        //code...
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        
    } catch (\Throwable $th) {
        //throw $th;
    }
?>