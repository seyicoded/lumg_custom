<?php
    require '../config/index.php';
    $config = new config();
    $con = $config->database();

    include '../security.php';
    if(!$auth){
        die('');
        return '';
    }

    // try to add new record into dB
    $email = $_REQUEST['email'];
    $order_id = $_REQUEST['order_id'];
    $desc = $_REQUEST['desc'];
    $price = $_REQUEST['price'];
    $status = $_REQUEST['status'];

    $status = mysqli_query($con, "INSERT INTO trans_history(order_id, email, h_desc, price, status) VALUES('$order_id', '$email', '$desc', '$price', '$status')");

    if($status){
        print(json_encode(
            [
                'status' => true,
                'message' => 'Added Successfully'
            ]
        ));
        return '';
    }else{
        print(json_encode(
            [
                'status' => false,
                'message' => 'Failed Successfully',
                'error' => mysqli_error($con)
            ]
        ));
        return '';
    }
?>