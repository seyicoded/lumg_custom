<?php
<<<<<<< HEAD
    include ('./env.php');
=======
    include 'env.php';
>>>>>>> 7bcf2b80e958db93e92d72450243a67a3cba4457
    class config{
        public function database(){
            return ( mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD));
        }
    }
?>