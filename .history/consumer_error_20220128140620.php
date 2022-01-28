<?php

echo 'aaa';
    return json_encode(
        [
            'status' => 'false',
            'message' => 'consumer information is invalid'
        ]
    );

    die(json_encode(
        [
            'status' => 'false',
            'message' => 'consumer information is invalid'
        ]
    ));
?>