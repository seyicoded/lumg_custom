<?php
    // include './env.php';
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
