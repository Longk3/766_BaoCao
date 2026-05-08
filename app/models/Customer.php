<?php
require_once "../app/config/database.php";

class Customer {
    private $conn;
    public function __construct() {
        $this->conn = (new Database())->connect();
    }
    public function getAll() {
        return $this->conn->query("SELECT * FROM customer")->fetchAll(PDO::FETCH_ASSOC);
    }
}