<?php
require_once "../app/config/database.php";

class User {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function login($u, $p) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$u]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $p == $user['password']) {
            return $user;
        }
        return false;
    }

    public function getAll() {
            return $this->conn->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
        }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($u, $p, $role) {
        $sql = "INSERT INTO users(username,password,role) VALUES(?,?,?)";
        return $this->conn->prepare($sql)->execute([$u,$p,$role]);
    }

    public function update($id, $u, $role) {
        $sql = "UPDATE users SET username=?, role=? WHERE id=?";
        return $this->conn->prepare($sql)->execute([$u,$role,$id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id=?";
        return $this->conn->prepare($sql)->execute([$id]);
    }
}