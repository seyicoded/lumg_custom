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
        $email = ($data->email);
        $username = ($data->username);
        $password = ($data->password);

        // check if user already exist
        $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM custom_holder_registration WHERE email = '$email' OR username = '$username' "));
        if( $num != 0){
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
        }
    } catch (\Throwable $th) {
        print(json_encode(
            [
                'status' => false,
                'message' => 'an error occurred'
            ]
        ));
    }
    

    // echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM wpdc_users"));
    $to = "opadonuseyi01@gmail.com";
    $subject = "HTML email";

    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    </tr>
    <tr>
    <td>John</td>
    <td>Doe</td>
    </tr>
    </table>
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <no-reply@lumigrowgroup.com>' . "\r\n";

    if(!mail($to,$subject,$message,$headers)){
        echo 'not sent';
    }

?>