<?php
    class Config {
        protected $conn = null;

        public function __construct() {
            require_once('dotenv.php');
            $DBHOST = $_ENV['DBHOST'];
            $DBUSER = $_ENV['DBUSER'];
            $DBPASS = $_ENV['DBPASS'];
            $DBNAME = $_ENV['DBNAME'];
            $dsn = 'mysql:host=' . $DBHOST . ';dbname=' . $DBNAME . '';

            try {
                $this->conn = new PDO($dsn, $DBUSER, $DBPASS);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } 
            catch (PDOException $e) {
                die('Connection Failed');
            }
            return $this->conn;
        }

        public function message($content,$status) {
            return json_encode(['message' => $content,'error' => $status]);
        }

        public function test_input($data) {
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            $data = trim($data);
            return $data;
        }
    }
?>