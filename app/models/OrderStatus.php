<?php
require_once "../app/config/database.php";

class OrderStatus {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM order_status")->fetchAll(PDO::FETCH_ASSOC);
    }
}