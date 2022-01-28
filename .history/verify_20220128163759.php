<?php 
    // just simple auth
    require './config/index.php';
    $config = new config();
    $con = $config->database();

    $email = base64_decode($_REQUEST['l']);

    // get data
    $data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM custom_holder_registration WHERE email = '$email'"));

    $data = json_decode($data['data'], true);

    // prepare to send cURL request for registrations
    $curl = curl_init();
    $data = http_build_query($data);
    $secret = "ck_b2c5927c3fea3a23cf914e01bf804e752e0c0db4:cs_49b054091a69141a09f042b56ad40bb467205dd5";

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.lumigrowgroup.com/wp-json/wc/v3/customers",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic $secret",
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $sent = curl_exec($curl);

    curl_close($send);
    $res = json_decode($sent);

        // print_r($res);
    $created = false;
    try{
        if($res->id != null){
            $created = true;
        }else{
            $created = false;
        }
    }catch(Exception $e){
        $created = false;
    }

    if($created){
        // update database
        $sql = "UPDATE custom_holder_registration SET status = 1 WHERE email = '$email'";
        if( mysqli_query($con, $sql) ){
            ?>
                <script>
                    alert('Account Activated Successfully');
                </script>
            <?php
        }else{

        }
    }else{

    }
    
?>