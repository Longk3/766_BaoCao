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
    public function find($id)
    {
        $sql = "SELECT * FROM customer
        WHERE customer_id=?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        return $this->conn
            ->query("SELECT COUNT(*) FROM customer")
            ->fetchColumn();
    }
}