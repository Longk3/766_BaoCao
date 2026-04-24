<?php
require_once "../app/models/Order.php";

class OrderService {
    private $model;

    public function __construct() {
        $this->model = new Order();
    }

    public function getAllOrders() {
        return $this->model->getAll();
    }

    public function updateStatus($id, $status) {
        return $this->model->updateStatus($id, $status);
    }
}