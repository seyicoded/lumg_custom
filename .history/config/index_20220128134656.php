<?php
    class config{
        public static $DB_HOST = 'localhost';
        public static $DB_USERNAME = 'lumigrm_custom';
        public static $DB_PASSWORD = 'Welcome1$$$$';
        public static $DB_DATABASE = 'lumigrm_wp606';
        public static $DB_PORT = 'localhost';
        
        public function database(){
            return ( mysqli_connect($this::$DB_HOST, $this::$DB_USERNAME, $this::$DB_PASSWORD));
        }
    }

?>