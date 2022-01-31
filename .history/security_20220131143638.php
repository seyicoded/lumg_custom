<?php

    $auth = false;
    
    if( !isset($_REQUEST['consumer_key']) || !isset($_REQUEST['consumer_secret']) ){
        con_err('Location:consumer_error.php');
    }else{
        $consumer_key = $_REQUEST['consumer_key'];
        $consumer_secret = $_REQUEST['consumer_secret'];

        if($consumer_key != 'ck_a29a5355edcfbff00f840e2cf3f0821b9671c212' || $consumer_secret != 'cs_a5bbfeb37ff90d2f41461914209b5f4bcb661c02'){
            con_err('Location:consumer_error.php');
        }else{
            $auth = true;
        }
    }

    function con_err($dt){
        print(json_encode(
            [
                'status' => false,
                'message' => 'consumer information is invalid'
            ]
        ));
        return json_encode(
            [
                'status' => false,
                'message' => 'consumer information is invalid'
            ]
        );

        die(json_encode(
            [
                'status' => false,
                'message' => 'consumer information is invalid'
            ]
        ));
    }
?>