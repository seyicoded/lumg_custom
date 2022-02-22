<?php

    $auth = false;
    
    if( !isset($_REQUEST['consumer_key']) || !isset($_REQUEST['consumer_secret']) ){
        con_err('Location:consumer_error.php');
    }else{
        $consumer_key = $_REQUEST['consumer_key'];
        $consumer_secret = $_REQUEST['consumer_secret'];

        if($consumer_key != 'ck_541ff2f0aa9c714cb0b21ffca61b3c0cbc374c81' || $consumer_secret != 'cs_3acfe3e686de381f7b3d8880708b774a21e36334'){
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