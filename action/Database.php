<?php
class Database {
    private $host = 'localhost';  // Corrected typo
    private $username = 'root';
    private $password = '';
    private $database = 'clubms';
    private static $instance = null;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
