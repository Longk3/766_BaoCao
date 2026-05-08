<?php
require_once "../app/models/Customer.php";
require_once "../app/libs/AuthMiddleware.php";

class CustomerController {
    public function index() {
        AuthMiddleware::role(['admin','operator']);
        $data = (new Customer())->getAll();
        require "../app/views/customer/index.php";
    }
}