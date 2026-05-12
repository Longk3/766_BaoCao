<?php

require_once "../app/config/database.php";

class User
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->connect();
    }

    // =========================
    // LOGIN
    // =========================
    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username=?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // password thường
        if ($user && $password == $user['password']) {
            return $user;
        }

        // password hash
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // =========================
    // GET ALL
    // =========================
    public function getAll()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";

        return $this->conn
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // =========================
    // FIND
    // =========================
    public function find($id)
    {
        $sql = "SELECT * FROM users WHERE id=?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // =========================
    // CREATE
    // =========================
    public function create($data)
    {
        $sql = "INSERT INTO users
        (
            full_name,
            username,
            password,
            role
        )
        VALUES
        (
            ?, ?, ?, ?
        )";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $data['full_name'],
            $data['username'],
            $data['password'],
            $data['role']
        ]);
    }

    // =========================
    // UPDATE
    // =========================
    public function update($id, $data)
    {
        $sql = "UPDATE users SET
        full_name=?,
        username=?,
        role=?
        WHERE id=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $data['full_name'],
            $data['username'],
            $data['role'],
            $id
        ]);
    }

    // =========================
    // DELETE
    // =========================
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$id]);
    }
}