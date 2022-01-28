<?php
    
    if( !isset($_REQUEST['consumer_key']) || !isset($_REQUEST['consumer_secret']) ){
        header('Location:consumer_error.php');
    }
    $consumer_key = $_REQUEST['consumer_key'];
    $consumer_secret = $_REQUEST['consumer_secret'];

    if($consumer_key != 'ck_b2c5927c3fea3a23cf914e01bf804e752e0c0db4' || $consumer_secret != 'cs_49b054091a69141a09f042b56ad40bb467205dd5'){
        header('Location:consumer_error.php');
    }
?>