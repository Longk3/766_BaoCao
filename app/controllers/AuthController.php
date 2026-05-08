<?php
require_once "../app/models/User.php";

class AuthController {

    public function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = (new User())->login($_POST['username'], $_POST['password']);

            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?action=dashboard");
                exit;
            } else {
                $error = "Sai tài khoản!";
            }
        }

        require "../app/views/auth/login.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
    }

    public function register() {

        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $db = (new Database())->connect();

            $sql = "INSERT INTO users(username,password,role)
                    VALUES (?, ?, 'operator')";

            $stmt = $db->prepare($sql);
            $stmt->execute([$username, $password]);

            header("Location: index.php?action=login");
        }

        require "../app/views/auth/register.php";
    }
}