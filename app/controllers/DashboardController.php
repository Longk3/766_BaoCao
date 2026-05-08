<?php
require_once "../app/config/database.php";
require_once "../app/libs/AuthMiddleware.php";

class DashboardController {
    public function index() {
        AuthMiddleware::check();
        $db = (new Database())->connect();
        $total = $db->query("SELECT COUNT(*) FROM orders")->fetchColumn();
        require "../app/views/dashboard.php";
    }
}