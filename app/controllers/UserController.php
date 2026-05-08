<?php
require_once "../app/models/User.php";
require_once "../app/libs/AuthMiddleware.php";

class UserController {

    // 📋 Danh sách user
    public function index() {
        AuthMiddleware::role(['admin']);

        $data = (new User())->getAll();

        require "../app/views/users/index.php";
    }

    // ➕ Thêm user
    public function create() {
        AuthMiddleware::role(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // validate
            if (empty($username) || empty($password)) {
                $error = "Không được để trống!";
            } else {
                (new User())->create($username, $password, $role);
                header("Location: index.php?action=users");
                exit;
            }
        }

        require "../app/views/users/create.php";
    }

    // ✏️ Sửa user
    public function edit() {
        AuthMiddleware::role(['admin']);

        $id = $_GET['id'];
        $user = (new User())->find($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $_POST['username'];
            $role = $_POST['role'];

            (new User())->update($id, $username, $role);

            header("Location: index.php?action=users");
            exit;
        }

        require "../app/views/users/edit.php";
    }

    // ❌ Xóa user
    public function delete() {
        AuthMiddleware::role(['admin']);

        $id = $_GET['id'];

        (new User())->delete($id);

        header("Location: index.php?action=users");
        exit;
    }

}