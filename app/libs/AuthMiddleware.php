<?php
class AuthMiddleware {

    public static function check() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }
    }

    public static function role($roles = []) {
        self::check();
        if (!in_array($_SESSION['user']['role'], $roles)) {
            echo "<h3 style='color:red'>403 - Không có quyền</h3>";
            exit;
        }
    }
}