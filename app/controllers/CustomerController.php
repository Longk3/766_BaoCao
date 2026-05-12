<?php
require_once "../app/models/Customer.php";
require_once "../app/libs/AuthMiddleware.php";

class CustomerController {
    public function index() {
        AuthMiddleware::role(['admin','operator']);
        $data = (new Customer())->getAll();
        require "../app/views/customer/index.php";
    }
    public function create()
    {
        require "../app/views/customers/create.php";
    }

    public function store()
    {
        require_once "../app/config/database.php";

        $db = (new Database())->connect();

        $sql = "INSERT INTO customer
        (full_name, phone, email, address)
        VALUES
        (?, ?, ?, ?)";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            $_POST['full_name'],
            $_POST['phone'],
            $_POST['email'],
            $_POST['address']
        ]);

        header("Location: ?action=customers");
    }

    public function show()
    {
        $id = $_GET['id'];

        require_once "../app/models/Customer.php";

        $model = new Customer();

        $customer = $model->find($id);

        require "../app/views/customers/show.php";
    }

    public function edit()
    {
        $id = $_GET['id'];

        require_once "../app/models/Customer.php";

        $model = new Customer();

        $customer = $model->find($id);

        require "../app/views/customers/edit.php";
    }

    public function update()
    {
        $id = $_POST['customer_id'];

        require_once "../app/config/database.php";

        $db = (new Database())->connect();

        $sql = "UPDATE customer SET
        full_name=?,
        phone=?,
        email=?,
        address=?
        WHERE customer_id=?";

        $stmt = $db->prepare($sql);

        $stmt->execute([
            $_POST['full_name'],
            $_POST['phone'],
            $_POST['email'],
            $_POST['address'],
            $id
        ]);

        header("Location: ?action=customers");
    }

    public function delete()
    {
        $id = $_GET['id'];

        require_once "../app/config/database.php";

        $db = (new Database())->connect();

        $stmt = $db->prepare("
            DELETE FROM customer
            WHERE customer_id=?
        ");

        $stmt->execute([$id]);

        header("Location: ?action=customers");
    }
}