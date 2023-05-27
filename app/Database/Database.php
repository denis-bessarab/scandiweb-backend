<?php
require_once 'dotenv.php';
require_once 'Config.php';

class Database
{
    public Config $config;

    public function __construct()
    {
        $this->setupDatabaseConnection();
    }

    private function setupDatabaseConnection(): void
    {
        $this->config = new Config();
        $this->setDatabaseHost($_ENV['DBHOST']);
        $this->setDatabaseUser($_ENV['DBUSER']);
        $this->setDatabasePassword($_ENV['DBPASS']);
        $this->setDatabaseName($_ENV['DBNAME']);

        $dsn = 'mysql:host=' . $this->getDatabaseHost() . ';dbname=' . $this->getDatabaseName();
        try {
            $this->config->conn = new PDO($dsn, $this->getDatabaseUser(), $this->getDatabasePassword());
            $this->config->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Connection Failed' . $e);
        }
    }

    public function getConnection(): PDO
    {
        return $this->config->conn;
    }

    private function setDatabaseHost(string $host): void
    {
        $this->config->databaseHost = $host;
    }

    private function getDatabaseHost(): string
    {
        return $this->config->databaseHost;
    }

    private function setDatabaseUser($user): void
    {
        $this->config->databaseUser = $user;
    }

    private function getDatabaseUser(): string
    {
        return $this->config->databaseUser;
    }

    private function setDatabasePassword($pass): void
    {
        $this->config->databasePassword = $pass;
    }

    private function getDatabasePassword(): string
    {
        return $this->config->databasePassword;
    }

    private function setDatabaseName($name): void
    {
        $this->config->databaseName = $name;
    }

    private function getDatabaseName(): string
    {
        return $this->config->databaseName;
    }

}
