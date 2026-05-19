<?php

require_once "../app/models/Order.php";
require_once "../app/models/Customer.php";
require_once "../app/models/Shipper.php";

class DashboardController {

    public function index()
    {
        $orderModel = new Order();
        $customerModel = new Customer();
        $shipperModel = new Shipper();

        // Tổng đơn
        $totalOrders = $orderModel->countAll();

        // Theo trạng thái
        $pending = $orderModel->countByStatus(1);
        $confirmed = $orderModel->countByStatus(2);
        $shipping = $orderModel->countByStatus(3);
        $success = $orderModel->countByStatus(4);
        $failed = $orderModel->countByStatus(5);
        $cancelled = $orderModel->countByStatus(6);

        // Khách hàng
        $totalCustomers = $customerModel->countAll();

        // shipper
        $totalShippers = $shipperModel->countAll();

        require "../app/views/dashboard/index.php";
    }
}