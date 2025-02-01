<?php
require_once "database.php";

class Crud extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function getData($query) {
        $result = $this->connection->query($query);
        if ($result == false) {
            return false;
        }
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;   
    }

    public function execute($query) {
        $result = $this->connection->query($query);

        if ($result === false) {
            echo "<p>Error executing query: " . $this->connection->error . "</p>";
            return false;
        }
        return true;
    }

    public function escape_string($value) {
        return $this->connection->real_escape_string($value);
    }

    public function sanitize($value) {
        return htmlspecialchars(strip_tags($this->escape_string($value)));
    }
}
?>
