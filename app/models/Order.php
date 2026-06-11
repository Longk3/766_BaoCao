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

                    o.status_id,

                    c.full_name AS customer_name,       

                    o.delivery_address,

                    o.total_amount,

                    os.status_name,

                    s.full_name AS shipper_name

                FROM orders o

                LEFT JOIN customer c 
                ON o.customer_id = c.customer_id

                LEFT JOIN order_status os 
                ON o.status_id = os.status_id

                LEFT JOIN assignment a 
                ON o.order_id = a.order_id

                LEFT JOIN shipper s 
                ON a.shipper_id = s.shipper_id

                ORDER BY o.order_id DESC";

        return $this->conn
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByShipper($shipper_id)
    {
        $sql = "SELECT
                    o.order_id,
                    c.full_name AS customer_name,
                    o.delivery_address,
                    o.total_amount,
                    os.status_name,
                    o.status_id
                FROM orders o
                JOIN customer c
                    ON o.customer_id = c.customer_id
                JOIN order_status os
                    ON o.status_id = os.status_id
                JOIN assignment a
                    ON o.order_id = a.order_id
                WHERE a.shipper_id = ?
                ORDER BY o.order_id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$shipper_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function find($id)
    {
        $sql = "
        SELECT o.*,
            c.full_name AS customer_name,
            s.full_name AS shipper_name,
            os.status_name
        FROM orders o
        JOIN customer c ON o.customer_id = c.customer_id
        JOIN order_status os ON o.status_id = os.status_id
        LEFT JOIN assignment a ON o.order_id = a.order_id
        LEFT JOIN shipper s ON a.shipper_id = s.shipper_id
        WHERE o.order_id = ?
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        return $this->conn
            ->query("SELECT COUNT(*) FROM orders")
            ->fetchColumn();
    }

    public function countByStatus($status)
    {
        $sql = "SELECT COUNT(*) FROM orders WHERE status_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$status]);

        return $stmt->fetchColumn();
    }

    public function getHistoryByShipper($shipper_id)
    {
        $sql = "SELECT
                    o.order_id,
                    c.full_name AS customer_name,
                    o.delivery_address,
                    o.total_amount,
                    os.status_name
                FROM orders o
                JOIN customer c
                    ON o.customer_id = c.customer_id
                JOIN order_status os
                    ON o.status_id = os.status_id
                JOIN assignment a
                    ON o.order_id = a.order_id
                WHERE a.shipper_id = ?
                AND o.status_id IN (4,5,6)
                ORDER BY o.order_id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$shipper_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function searchAndFilter($keyword = '', $status = '')
{
    $sql = "
        SELECT
            o.order_id,
            o.status_id,
            c.full_name AS customer_name,
            o.delivery_address,
            o.total_amount,
            os.status_name,
            s.full_name AS shipper_name

        FROM orders o

        LEFT JOIN customer c
            ON o.customer_id = c.customer_id

        LEFT JOIN order_status os
            ON o.status_id = os.status_id

        LEFT JOIN assignment a
            ON o.order_id = a.order_id

        LEFT JOIN shipper s
            ON a.shipper_id = s.shipper_id

        WHERE 1=1
    ";

    $params = [];

    if (!empty($keyword))
    {
        $sql .= "
            AND (
                c.full_name LIKE ?
                OR o.order_id LIKE ?
                OR o.delivery_address LIKE ?
            )
        ";

        $params[] = "%$keyword%";
        $params[] = "%$keyword%";
        $params[] = "%$keyword%";
    }

    if (!empty($status))
    {
        $sql .= " AND o.status_id = ? ";

        $params[] = $status;
    }

    $sql .= " ORDER BY o.order_id DESC";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}