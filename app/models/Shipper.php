<?php
require_once "../app/config/database.php";

class Shipper {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM shipper")->fetchAll(PDO::FETCH_ASSOC);
    }
}