<?php
require_once "../app/config/database.php";

class Assignment {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function assign($order_id, $shipper_id) {
        $sql = "INSERT INTO assignment(order_id, shipper_id, assigned_date)
                VALUES (?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$order_id, $shipper_id]);
    }
}