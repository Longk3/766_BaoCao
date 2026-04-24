<?php
require_once "../app/config/database.php";
require_once "../app/libs/AuthMiddleware.php";

class DashboardController {

    public function index() {
        AuthMiddleware::check();

        $db = (new Database())->connect();

        $total = $db->query("SELECT COUNT(*) FROM orders")->fetchColumn();

        $status = $db->query("
            SELECT os.status_name, COUNT(*) total
            FROM orders o
            JOIN order_status os ON o.status_id = os.id
            GROUP BY os.status_name
        ")->fetchAll(PDO::FETCH_ASSOC);

        require "../app/views/dashboard.php";
    }
}