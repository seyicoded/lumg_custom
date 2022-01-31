<?php 
    // echo 's aas   ';die('reaced');
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
    $secret = "ck_a29a5355edcfbff00f840e2cf3f0821b9671c212:cs_a5bbfeb37ff90d2f41461914209b5f4bcb661c02";

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
    CURLOPT_USERPWD => $secret,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Basic $secret",
        'Content-Type: application/x-www-form-urlencoded'
    ),
    ));

    $sent = curl_exec($curl);

    curl_close($curl);
    $res = json_decode($sent);

        // print_r($res);
    $created = false;
    try{
        if(isset($res->id)){
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
            echo '...';
        }
    }else{
        echo $sent;
    }
    
?>