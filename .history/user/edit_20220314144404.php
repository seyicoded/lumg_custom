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
    $user_id = $_REQUEST['user_id'];
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $phone = $_REQUEST['phone'];

    try {
        //code...

        // to change first_name
        $sql_data = mysqli_query($con, "SELECT * FROM wp_usermeta WHERE user_id = '$user_id'");
        $num = mysqli_num_rows($sql_data);

        $hasPhoneEntry = false;

        for($i = 0 ; $i < $num ; $i++){
            $r = mysqli_fetch_assoc($sql_data);

            switch ($r['meta_key']) {
                // normal first name
                case 'first_name':
                    mysqli_query($con, "UPDATE wp_usermeta SET meta_value='$first_name' WHERE umeta_id='".$r['umeta_id']."'");
                    break;

                case 'billing_first_name':
                    mysqli_query($con, "UPDATE wp_usermeta SET meta_value='$first_name' WHERE umeta_id='".$r['umeta_id']."'");
                    break;

                case 'shipping_first_name':
                    mysqli_query($con, "UPDATE wp_usermeta SET meta_value='$first_name' WHERE umeta_id='".$r['umeta_id']."'");
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        print(json_encode(
            [
                'status' => true,
                'message' => 'User Data Updated',
            ]
        ));
        return '';

    } catch (\Throwable $th) {
        //throw $th;
        print(json_encode(
            [
                'status' => false,
                'message' => 'An error occurred',
                'log' => $th->getMessage(),
            ]
        ));
        return '';
    }

    
?>