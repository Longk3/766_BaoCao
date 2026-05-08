<?php
require_once "../app/config/database.php";

class Assignment {
    private $conn;
    public function __construct() {
        $this->conn = (new Database())->connect();
    }
    public function assign($order_id, $shipper_id) {
    // check đã có chưa
    $check = $this->conn->prepare("SELECT * FROM assignment WHERE order_id=?");
    $check->execute([$order_id]);

    if ($check->rowCount() > 0) {
        // update thay vì insert
        $sql = "UPDATE assignment SET shipper_id=?, assigned_date=NOW() WHERE order_id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$shipper_id, $order_id]);
    }

    // chưa có thì insert
    $sql = "INSERT INTO assignment(order_id, shipper_id, assigned_date)
            VALUES (?, ?, NOW())";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$order_id, $shipper_id]);
}
}