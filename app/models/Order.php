<?php
require_once "../app/config/database.php";

class Order {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function getAll() {
        $sql = "SELECT 
                    o.order_id,
                    c.full_name AS customer_name,
                    o.delivery_address,
                    o.total_amount,
                    os.status_name,
                    s.full_name AS shipper_name
                FROM orders o
                LEFT JOIN customer c ON o.customer_id = c.customer_id
                LEFT JOIN order_status os ON o.status_id = os.status_id
                LEFT JOIN assignment a ON o.order_id = a.order_id
                LEFT JOIN shipper s ON a.shipper_id = s.shipper_id
                ORDER BY o.order_id DESC";

        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($customer_id, $address, $amount) {
        $sql = "INSERT INTO orders(customer_id, order_date, delivery_address, total_amount, status_id)
                VALUES (?, NOW(), ?, ?, 1)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$customer_id, $address, $amount]);
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE orders SET status_id=? WHERE order_id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$status, $id]);
    }
}