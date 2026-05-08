<?php
require_once "../app/models/Assignment.php";
require_once "../app/libs/AuthMiddleware.php";

class AssignmentController {

    public function assign() {
        // chỉ admin mới được phân công
        AuthMiddleware::role(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $order_id = $_POST['order_id'];
            $shipper_id = $_POST['shipper_id'];

            (new Assignment())->assign($order_id, $shipper_id);

            header("Location: index.php?action=orders");
        }
    }
}