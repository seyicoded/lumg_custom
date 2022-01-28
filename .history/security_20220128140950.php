<?php
    
    if( !isset($_REQUEST['consumer_key']) || !isset($_REQUEST['consumer_secret']) ){
        con_err('Location:consumer_error.php');
    }
    $consumer_key = $_REQUEST['consumer_key'];
    $consumer_secret = $_REQUEST['consumer_secret'];

    if($consumer_key != 'ck_b2c5927c3fea3a23cf914e01bf804e752e0c0db4' || $consumer_secret != 'cs_49b054091a69141a09f042b56ad40bb467205dd5'){
        con_err('Location:consumer_error.php');
    }

    function con_err($dt){
        echo 'aaa';
        return json_encode(
            [
                'status' => 'false',
                'message' => 'consumer information is invalid'
            ]
        );

        die(json_encode(
            [
                'status' => 'false',
                'message' => 'consumer information is invalid'
            ]
        ));
    }
?>