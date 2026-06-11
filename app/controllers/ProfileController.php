<?php

require_once "../app/models/User.php";

class ProfileController
{
    private $model;

    public function __construct()
    {
        $this->model = new User();

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    // Hiển thị thông tin cá nhân
    public function show()
    {
        $id = $_SESSION['user']['id'];

        $user = $this->model->find($id);

        require "../app/views/profile/index.php";
    }

    // Form sửa
    public function edit()
    {
        $id = $_SESSION['user']['id'];

        $user = $this->model->find($id);

        require "../app/views/profile/edit.php";
    }

    // Cập nhật
    public function update()
    {
        $id = $_SESSION['user']['id'];

        $this->model->updateProfile(
            $id,
            $_POST['full_name']
        );

        $_SESSION['user']['full_name'] = $_POST['full_name'];

        header("Location: ?action=profile");
    }

    // Form đổi mật khẩu
    public function changePassword()
    {
        require "../app/views/profile/change_password.php";
    }

    // Cập nhật mật khẩu
    public function updatePassword()
    {
        $id = $_SESSION['user']['id'];

        $user = $this->model->find($id);

        if($_POST['old_password'] != $user['password'])
        {
            die("Mật khẩu cũ không đúng!");
        }

        $this->model->changePassword(
            $id,
            $_POST['new_password']
        );

        header("Location:?action=profile");
    }
}