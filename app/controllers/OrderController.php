<?php
require_once "../app/models/Order.php";
require_once "../app/models/Customer.php";
require_once "../app/models/Shipper.php";
require_once "../app/models/OrderStatus.php";
require_once "../app/models/Assignment.php";
require_once "../app/libs/AuthMiddleware.php";

class OrderController {

    public function index() {
        AuthMiddleware::role(['admin','operator']);
        $orders = (new Order())->getAll();
        $shippers = (new Shipper())->getAll();
        $statuses = (new OrderStatus())->getAll();
        require "../app/views/orders/index.php";
    }

    public function create() {
        AuthMiddleware::role(['admin','operator']);

        if ($_POST) {
            $order = new Order();
            $order->create(
                $_POST['customer_id'],
                $_POST['address'],
                $_POST['amount']
            );

            $order_id = $this->conn->lastInsertId();

            // auto assign
            $this->autoAssign($order_id);

            header("Location:?action=orders");
        }
    }

    public function autoAssign($order_id) {
        $db = (new Database())->connect();

        $shipper = $db->query("
            SELECT shipper_id FROM shipper
            ORDER BY RAND() LIMIT 1
        ")->fetch();

        (new Assignment())->assign($order_id, $shipper['shipper_id']);
    }

    public function updateStatus() {
        AuthMiddleware::role(['admin','operator']);
        (new Order())->updateStatus($_POST['id'], $_POST['status']);
        header("Location: index.php?action=orders");
    }



    public function myOrders() {
        AuthMiddleware::role(['shipper']);

        $shipper_id = $_SESSION['user']['shipper_id'];

        $orders = (new Order())->getByShipper($shipper_id);

        require "../app/views/orders/my_orders.php";
}
}