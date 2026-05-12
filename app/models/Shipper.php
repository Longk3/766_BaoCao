<?php

require_once "../app/config/database.php";

class Shipper
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->connect();
    }

    // Lấy tất cả
    public function getAll()
    {
        $sql = "SELECT * FROM shipper
        ORDER BY shipper_id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tìm theo ID
    public function find($id)
    {
        $sql = "SELECT * FROM shipper
        WHERE shipper_id=?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm
    public function create($data)
    {
        $sql = "INSERT INTO shipper
        (full_name, phone, vehicle_type, area)
        VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $data['full_name'],
            $data['phone'],
            $data['vehicle_type'],
            $data['area']
        ]);
    }

    // Cập nhật
    public function update($id, $data)
    {
        $sql = "UPDATE shipper SET
        full_name=?,
        phone=?,
        vehicle_type=?,
        area=?
        WHERE shipper_id=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $data['full_name'],
            $data['phone'],
            $data['vehicle_type'],
            $data['area'],
            $id
        ]);
    }

    // Xóa
    public function delete($id)
    {
        $sql = "DELETE FROM shipper
        WHERE shipper_id=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
}