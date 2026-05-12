<?php

require_once "../app/models/User.php";
require_once "../app/libs/AuthMiddleware.php";

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    // 📋 Danh sách user
    public function index()
    {
        AuthMiddleware::role(['admin']);

        $users = $this->model->getAll();

        require "../app/views/users/index.php";
    }

    // ➕ Thêm user
    public function create()
    {
        AuthMiddleware::role(['admin']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $full_name = trim($_POST['full_name']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $role = $_POST['role'];

            // validate
            if (
                empty($full_name) ||
                empty($username) ||
                empty($password)
            ) {

                $error = "Vui lòng nhập đầy đủ thông tin!";
            } else {

                // hash password
                $passwordHash = password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

                $this->model->create([
                    'full_name' => $full_name,
                    'username' => $username,
                    'password' => $passwordHash,
                    'role' => $role
                ]);

                header("Location: index.php?action=users");
                exit;
            }
        }

        require "../app/views/users/create.php";
    }

    // ✏️ Sửa user
    public function edit()
    {
        AuthMiddleware::role(['admin']);

        $id = $_GET['id'];

        $user = $this->model->find($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $full_name = trim($_POST['full_name']);
            $username = trim($_POST['username']);
            $role = $_POST['role'];

            if (
                empty($full_name) ||
                empty($username)
            ) {

                $error = "Không được để trống!";
            } else {

                $this->model->update($id, [
                    'full_name' => $full_name,
                    'username' => $username,
                    'role' => $role
                ]);

                header("Location: index.php?action=users");
                exit;
            }
        }

        require "../app/views/users/edit.php";
    }

    // ❌ Xóa user
    public function delete()
    {
        AuthMiddleware::role(['admin']);

        $id = $_GET['id'];

        $this->model->delete($id);

        header("Location: index.php?action=users");
        exit;
    }
}