<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng nhập hệ thống</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    padding:0;
    height:100vh;
    background: linear-gradient(to right,#d70018,#ff4d4f);
    font-family: Arial, Helvetica, sans-serif;
}

.login-container{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-card{
    width:420px;
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.logo{
    text-align:center;
    margin-bottom:25px;
}

.logo h2{
    color:#d70018;
    font-weight:bold;
}

.form-control{
    height:50px;
    border-radius:10px;
}

.btn-login{
    background:#d70018;
    color:white;
    height:50px;
    border:none;
    border-radius:10px;
    width:100%;
    font-size:18px;
    transition:0.3s;
}

.btn-login:hover{
    background:#b80014;
}

.register-link{
    text-align:center;
    margin-top:15px;
}

.register-link a{
    color:#d70018;
    text-decoration:none;
    font-weight:bold;
}

.icon{
    font-size:60px;
}

</style>
</head>

<body>

<div class="login-container">

<div class="login-card">

<div class="logo">
<div class="icon">🚚</div>
<h2>GiaoHang 766</h2>
<p>Hệ thống quản lý giao hàng</p>
</div>

<form method="POST" action="?action=login">

<div class="mb-3">
<input type="text"
name="username"
class="form-control"
placeholder="Tên đăng nhập"
required>
</div>

<div class="mb-3">
<input type="password"
name="password"
class="form-control"
placeholder="Mật khẩu"
required>
</div>

<button class="btn-login">
Đăng nhập
</button>

</form>

<div class="register-link">
Chưa có tài khoản?
<a href="?action=register">Đăng ký</a>
</div>

</div>

</div>

</body>
</html>