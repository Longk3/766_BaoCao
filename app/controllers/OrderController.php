<?php
require_once "../app/models/Order.php";
require_once "../app/models/Customer.php";
require_once "../app/models/Shipper.php";
require_once "../app/models/OrderStatus.php";

class OrderController {

    public function index() {
        $orders = (new Order())->getAll();
        $shippers = (new Shipper())->getAll();
        $statuses = (new OrderStatus())->getAll();

        require "../app/views/orders/index.php";
    }

    public function create() {
        $customers = (new Customer())->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            (new Order())->create(
                $_POST['customer_id'],
                $_POST['address'],
                $_POST['amount']
            );
            header("Location: index.php?action=orders");
        }

        require "../app/views/orders/create.php";
    }

    public function updateStatus() {
        (new Order())->updateStatus($_POST['id'], $_POST['status']);
        header("Location: index.php?action=orders");
    }
}