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

    // extract datas
    try {
        $plain_data = $_REQUEST['data'];
        $data = json_decode($plain_data);
        // print($plain_data);
        // print_r($data);
        // die('');
        $email = ($data->email);
        $username = ($data->username);
        $password = ($data->password);

        // check if user already exist
        $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM custom_holder_registration WHERE email = '$email' OR username = '$username' "));
        if( $num != 0){
            // user already exist
            print(json_encode(
                [
                    'status' => false,
                    'message' => 'user already exist'
                ]
            ));
            die('');
            return '';
        }else{
            // insert into dB
            $sql = "INSERT INTO custom_holder_registration(email, username, password, data) VALUES('$email', '$username', '$password', '$plain_data')";
            if(  mysqli_query($con, $sql) ){
                sendMail($email);
                print(json_encode(
                    [
                        'status' => true,
                        'message' => 'Activation Link Created Successfully'
                    ]
                ));
            }else{
                // error inputting into dB
                print(json_encode(
                    [
                        'status' => false,
                        'message' => 'try again later #2'
                    ]
                ));
                die('');
                return '';
            }
        }
    } catch (\Throwable $th) {
        print(json_encode(
            [
                'status' => false,
                'message' => 'an error occurred'
            ]
        ));
    }
    
    function sendMail($email){
        // echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM wpdc_users"));
        $to = $email;
        $subject = "Account Activation Link";
        $link = $_SERVER['SERVER_NAME']."/v1/verify?l=".base64_encode($email);

        $message = "
        <html>
        <head>
        <title>$subject</title>
        </head>
        <body>
            <p>Click the link below to activate your account!</p>
    
            <a href='$link'>Click Here</a>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <no-reply@lumigrowgroup.com>' . "\r\n";

        if(!mail($to,$subject,$message,$headers)){
            // echo 'not sent';
            return false;
        }
        return true;
    }
    
?>