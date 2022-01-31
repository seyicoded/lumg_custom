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
    } catch (\Throwable $th) {
        //throw $th;
    }
?>