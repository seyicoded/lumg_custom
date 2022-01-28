<?php
    include ('env.php');
    class config{
        public function database(){
            return ( mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD));
        }
    }
?>