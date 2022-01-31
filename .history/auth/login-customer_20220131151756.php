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
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $secret = "ck_a29a5355edcfbff00f840e2cf3f0821b9671c212:cs_a5bbfeb37ff90d2f41461914209b5f4bcb661c02";

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.lumigrowgroup.com/?rest_route=/simple-jwt-login/v1/auth&email=$email&password=$password",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_USERPWD => $secret,
        CURLOPT_HTTPHEADER => array(
            // "Authorization: Basic $secret",
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $sent = curl_exec($curl);

        curl_close($curl);
        $res = json_decode($sent);

        if($res->status){

        }else{
            // account not found
            print(json_encode(
                [
                    'status' => false,
                    'message' => 'account not found'
                ]
            ));
            return '';
        }

        // filter to get user id
        // filter stop
    
    } catch (\Throwable $th) {
        //throw $th;
    }
?>