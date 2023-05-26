<?php

require_once('dotenv.php');

class Config {
    private $conn;
    private $databaseHost;
    private $databaseUser;
    private $databasePassword;
    private $databaseName;

    public function __construct() {
        $this->setupDatabaseConnection();
    }

    private function setupDatabaseConnection() {
        $this->setdatabaseHost($_ENV['DBHOST']);
        $this->setdatabaseUser($_ENV['DBUSER']);
        $this->setdatabasePassword($_ENV['DBPASS']);
        $this->setdatabaseName($_ENV['DBNAME']);

        $dsn = 'mysql:host=' . $this->getDatabaseHost() . ';databaseName=' . $this->getDatabaseName();

        try {
            $this->conn = new PDO($dsn, $this->getDatabaseUser(), $this->getDatabasePassword());
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Connection Failed' . $e);
        }
    }

    protected function getConnection() {
        return $this->conn;
    }

    public function setMessage($content, $status) {
        $message = ['content' => $content, 'status' => $status];
        return json_encode($message);
    }

    public function testInput($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }

    private function setDatabaseHost($host) {
        $this->databaseHost = $host;
    }

    private function getDatabaseHost() {
        return $this->databaseHost;
    }

    private function setDatabaseUser($user) {
        $this->databaseUser = $user;
    }

    private function getDatabaseUser() {
        return $this->databaseUser;
    }

    private function setDatabasePassword($pass) {
        $this->databasePassword = $pass;
    }

    private function getDatabasePassword() {
        return $this->databasePassword;
    }

    private function setDatabaseName($name) {
        $this->databaseName = $name;
    }

    private function getDatabaseName() {
        return $this->databaseName;
    }
}
?>