<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'mysql';
    private $database = 'subscriber_portal';
    protected $connection;

    public function __construct() {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->connection->connect_error) {
                die("<p>Connection failed: " . $this->connection->connect_error . "</p>");
            }
        }
        return $this->connection;
    }
}
?>
