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
                $error = "Sai tài khoản hoặc mật khẩu!";
            }
        }

        require "../app/views/auth/login.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
    }
}