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

    $result = mysqli_query($con, "SELECT * FROM trans_history WHERE email='$email'");
    $result_count = mysqli_num_rows($result);
    $data = [];
    for($i =0 ; $i < $result_count; $i++){
        $data[$i] = mysqli_fetch_array($result);
    }

    try {
        // mysqli_query($con, "UPDATE noti_holder SET status = 1 WHERE email = '$email'");
    } catch (\Throwable $th) {
        //throw $th;
    }

    if(true){
        print(json_encode(
            [
                'status' => true,
                'message' => 'Gotten Successfully',
                'data' => ($data),
                'count' => $result_count
            ]
        ));
        return '';
    }
?>