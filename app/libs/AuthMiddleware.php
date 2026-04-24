<?php
class AuthMiddleware {

    public static function check() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
    }

    public static function role($role) {
        if ($_SESSION['user']['role'] !== $role) {
            die("Không có quyền truy cập!");
        }
    }
}