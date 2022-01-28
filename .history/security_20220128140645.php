<?php
    
    try {
        if( ($_REQUEST['consumer_key'] == null) && ($_REQUEST['consumer_secret'] == null) ){
        
        }
    } catch (\Throwable $th) {
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

    $consumer_key = $_REQUEST['consumer_key'];
    $consumer_secret = $_REQUEST['consumer_secret'];

    if($consumer_key != 'ck_b2c5927c3fea3a23cf914e01bf804e752e0c0db4' || $consumer_secret != 'cs_49b054091a69141a09f042b56ad40bb467205dd5'){
        header('Location:consumer_error.php');
    }
?>