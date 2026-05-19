<?php

require_once "../app/models/Shipper.php";
require_once "../app/models/Order.php";
require_once "../app/libs/AuthMiddleware.php";

class ShipperController
{
    private $model;

    public function __construct()
    {
        $this->model = new Shipper();
    }

    // Danh sách shipper
    public function index()
    {
        AuthMiddleware::role(['admin']);

        $shippers = $this->model->getAll();

        require "../app/views/shipper/index.php";
    }

    // Form thêm
    public function create()
    {
        AuthMiddleware::role(['admin']);

        require "../app/views/shipper/create.php";
    }

    // Lưu thêm
    public function store()
    {
        AuthMiddleware::role(['admin']);

        $this->model->create([
            'full_name' => $_POST['full_name'],
            'phone' => $_POST['phone'],
            'vehicle_type' => $_POST['vehicle_type'],
            'area' => $_POST['area']
        ]);

        header("Location: ?action=shippers");
    }

    // Chi tiết
    public function show()
    {
        AuthMiddleware::role(['admin']);

        $id = $_GET['id'];

        $shipper = $this->model->find($id);

        require "../app/views/shipper/show.php";
    }

    // Form sửa
    public function edit()
    {
        AuthMiddleware::role(['admin']);

        $id = $_GET['id'];

        $shipper = $this->model->find($id);

        require "../app/views/shipper/edit.php";
    }

    // Cập nhật
    public function update()
    {
        AuthMiddleware::role(['admin']);

        $id = $_POST['shipper_id'];

        $this->model->update($id, [
            'full_name' => $_POST['full_name'],
            'phone' => $_POST['phone'],
            'vehicle_type' => $_POST['vehicle_type'],
            'area' => $_POST['area']
        ]);

        header("Location: ?action=shippers");
    }

    // Xóa
    public function delete()
    {
        AuthMiddleware::role(['admin']);

        $id = $_GET['id'];

        $this->model->delete($id);

        header("Location: ?action=shippers");
    }

    // Đơn hàng của shipper
    public function myOrders()
    {
        AuthMiddleware::role(['shipper']);

        $shipper_id = $_SESSION['user']['shipper_id'];

        $orders = (new Order())->getByShipper($shipper_id);

        require "../app/views/shipper/my_orders.php";
    }

    // Lịch sử giao hàng
    public function history()
    {
        AuthMiddleware::role(['shipper']);

        $shipper_id = $_SESSION['user']['shipper_id'];

        $orders = (new Order())->getHistoryByShipper($shipper_id);

        require "../app/views/shipper/history.php";
    }
}