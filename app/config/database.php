<?php
class Database {
    private $host = "localhost";
    private $db = "data_giaohang";
    private $user = "root";
    private $pass = "";

    public function connect() {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->db;charset=utf8",
                $this->user,
                $this->pass
            );
        } catch (PDOException $e) {
            die("Lỗi DB: " . $e->getMessage());
        }
    }
}