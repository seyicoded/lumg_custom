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
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $desc = $_REQUEST['desc'];

    $status = mysqli_query($con, "INSERT INTO noti_holder(email, title, content) VALUES('$email', '$title', '$content')");

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