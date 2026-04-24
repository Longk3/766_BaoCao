<?php
require_once "../app/models/Customer.php";

class CustomerController {

    public function index() {
        $data = (new Customer())->getAll();
        require "../app/views/customer/index.php";
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            (new Customer())->create([
                $_POST['name'],
                $_POST['phone'],
                $_POST['email'],
                $_POST['address']
            ]);
            header("Location: index.php?action=customers");
        }
        require "../app/views/customer/create.php";
    }
}