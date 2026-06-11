<?php
require_once "../app/models/Order.php";
require_once "../app/models/Customer.php";
require_once "../app/models/Shipper.php";
require_once "../app/models/OrderStatus.php";
require_once "../app/models/Assignment.php";
require_once "../app/libs/AuthMiddleware.php";

class OrderController {

    public function index()
    {
    AuthMiddleware::role(['admin','operator']);

    $keyword = $_GET['keyword'] ?? '';

    $status = $_GET['status'] ?? '';

    $orderModel = new Order();

    $orders = $orderModel->searchAndFilter(
        $keyword,
        $status
    );

    $shippers = (new Shipper())->getAll();

    $statuses = (new OrderStatus())->getAll();

    require "../app/views/orders/index.php";
    }

    public function create()
    {
        require_once "../app/models/Customer.php";
        require_once "../app/models/Shipper.php";

        $customerModel = new Customer();
        $shipperModel = new Shipper();

        $customers = $customerModel->getAll();
        $shippers = $shipperModel->getAll();

        require "../app/views/orders/create.php";
    }

    public function store()
    {
        $customer_id = $_POST['customer_id'];
        $delivery_address = $_POST['delivery_address'];
        $total_amount = $_POST['total_amount'];
        $shipper_id = $_POST['shipper_id'];

        require_once "../app/config/database.php";

        $db = (new Database())->connect();

        // thêm order
        $sql = "INSERT INTO orders
        (customer_id, order_date, delivery_address, total_amount, status_id)
        VALUES
        (?, NOW(), ?, ?, 1)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            $customer_id,
            $delivery_address,
            $total_amount
        ]);

        $order_id = $db->lastInsertId();

        // phân công shipper
        $sql2 = "INSERT INTO assignment
        (order_id, shipper_id, assigned_date, note)
        VALUES
        (?, ?, NOW(), 'Đơn mới')";

        $stmt2 = $db->prepare($sql2);

        $stmt2->execute([
            $order_id,
            $shipper_id
        ]);

        header("Location: ?action=orders");
    }

    public function show()
    {
        $id = $_GET['id'];

        require_once "../app/models/Order.php";

        $model = new Order();

        $order = $model->find($id);

        require "../app/views/orders/show.php";
    }

    public function edit()
    {
        $id = $_GET['id'];

        require_once "../app/models/Order.php";
        require_once "../app/models/Customer.php";
        require_once "../app/models/Shipper.php";

        $orderModel = new Order();
        $customerModel = new Customer();
        $shipperModel = new Shipper();

        $order = $orderModel->find($id);

        $customers = $customerModel->getAll();
        $shippers = $shipperModel->getAll();

        require "../app/views/orders/edit.php";
    }

    public function update()
    {
        $id = $_POST['order_id'];

        require_once "../app/config/database.php";

        $db = (new Database())->connect();

        $sql = "UPDATE orders SET
        customer_id=?,
        delivery_address=?,
        total_amount=?
        WHERE order_id=?";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            $_POST['customer_id'],
            $_POST['delivery_address'],
            $_POST['total_amount'],
            $id
        ]);

        // update shipper
        $sql2 = "UPDATE assignment SET
        shipper_id=?
        WHERE order_id=?";

        $stmt2 = $db->prepare($sql2);

        $stmt2->execute([
            $_POST['shipper_id'],
            $id
        ]);

        header("Location: ?action=orders");
    }

    public function delete()
    {
        $id = $_GET['id'];

        require_once "../app/config/database.php";

        $db = (new Database())->connect();

        // xóa assignment trước
        $stmt1 = $db->prepare("
            DELETE FROM assignment
            WHERE order_id=?
        ");

        $stmt1->execute([$id]);

        // xóa order
        $stmt2 = $db->prepare("
            DELETE FROM orders
            WHERE order_id=?
        ");

        $stmt2->execute([$id]);

        header("Location: ?action=orders");
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