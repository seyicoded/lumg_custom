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
        $email = $_REQUEST['email'];

        // check if user already exist
        $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM custom_holder_registration WHERE email = '$email' "));
        if( $num != 0){
            sendMail($email);
            // user already exist
            print(json_encode(
                [
                    'status' => true,
                        'message' => 'Activation Link Re-Sent Successfully'
                ]
            ));
            die('');
            return '';
        }else{
            print(json_encode(
                [
                    'status' => false,
                    'message' => 'Account Not Found'
                ]
            ));
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
        $link = $_SERVER['SERVER_NAME']."/verify?l=".base64_encode($email);

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