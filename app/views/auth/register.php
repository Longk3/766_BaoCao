<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng ký</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    padding:0;
    height:100vh;
    background: linear-gradient(to right,#d70018,#ff4d4f);
    font-family: Arial;
}

.register-container{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.register-card{
    width:450px;
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.form-control{
    height:50px;
    border-radius:10px;
}

.btn-register{
    background:#d70018;
    color:white;
    width:100%;
    height:50px;
    border:none;
    border-radius:10px;
    font-size:18px;
}

.btn-register:hover{
    background:#b80014;
}

.title{
    text-align:center;
    margin-bottom:25px;
}

.title h2{
    color:#d70018;
    font-weight:bold;
}

</style>
</head>

<body>

<div class="register-container">

<div class="register-card">

<div class="title">
<h2>🚚 Đăng ký tài khoản</h2>
<p>Tạo tài khoản nhân viên điều phối</p>
</div>

<form method="POST">

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

<button class="btn-register">
Đăng ký
</button>

</form>

</div>

</div>

</body>
</html>