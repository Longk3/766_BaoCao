<?php
require_once "../app/models/Assignment.php";

class AssignmentController {

    public function assign() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            (new Assignment())->assign($_POST['order_id'], $_POST['shipper_id']);
            header("Location: index.php?action=orders");
        }
    }
}