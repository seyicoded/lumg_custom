<?php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    include ('./env.php');
=======
    include 'env.php';
>>>>>>> 7bcf2b80e958db93e92d72450243a67a3cba4457
=======
    include './env.php';
>>>>>>> b51249b312c18ea5caf5fbea44909bbbe33750b2
=======
    // include './env.php';
>>>>>>> 6d2486d97cc49c26b277d856e25dc85deb2aeceb
=======
>>>>>>> dc3e2aae11e9a5c44f9b59a53da958b92216459a
    class config{
        public $DB_HOST = 'localhost';
        public $DB_USERNAME = 'lumigrm_custom';
        public $DB_PASSWORD = 'Welcome1$$$$';
        public $DB_DATABASE = 'lumigrm_wp606';
        public $DB_PORT = 'localhost';
        
        public function database(){
            return ( mysqli_connect($this::$DB_HOST, $this::$DB_USERNAME, $this::$DB_PASSWORD));
        }
    }

?>