<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}

$u = $_SESSION['user'] ?? null;
?>

<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Hệ thống giao hàng</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial;
    background:#f4f6f9;
}

/* ================= SIDEBAR ================= */

.sidebar{
    position:fixed;
    width:260px;
    height:100vh;
    background:#1f2937;
    padding:20px;
    overflow-y:auto;
}

.logo{
    color:white;
    font-size:30px;
    font-weight:bold;
    margin-bottom:30px;
    text-align:center;
}

.user-box{
    background:#374151;
    padding:15px;
    border-radius:12px;
    color:white;
    margin-bottom:30px;
}

.user-box h5{
    margin-bottom:5px;
}

.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:14px;
    border-radius:10px;
    margin-bottom:10px;
    transition:0.3s;
    font-size:15px;
}

.menu a:hover{
    background:#d70018;
    transform:translateX(5px);
}

.menu i{
    margin-right:10px;
}

/* ================= CONTENT ================= */

.content{
    margin-left:260px;
    padding:30px;
}

.topbar{
    background:white;
    padding:15px 25px;
    border-radius:15px;
    margin-bottom:30px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.card-box{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.table{
    margin-top:20px;
}

.badge-status{
    padding:8px 12px;
    border-radius:20px;
    color:white;
    font-size:14px;
}

/* STATUS */

.bg-success2{
    background:#16a34a;
}

.bg-warning2{
    background:#f59e0b;
}

.bg-danger2{
    background:#dc2626;
}

.bg-primary2{
    background:#2563eb;
}

/* RESPONSIVE */

@media(max-width:768px){

.sidebar{
    width:100%;
    height:auto;
    position:relative;
}

.content{
    margin-left:0;
}

}

</style>

</head>

<body>

<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

<div class="logo">
🚚 GiaoHang
</div>

<div class="user-box">

<h5>
<?= $u['username'] ?? '' ?>
</h5>

<p style="margin-bottom:5px;">
<?= strtoupper($u['role'] ?? '') ?>
</p>

<?php if(($u['role'] ?? '') == 'shipper'): ?>

<hr style="border-color:#666;">

<p style="margin:0;font-size:14px;">
👤 <?= $u['full_name'] ?? '' ?>
</p>

<?php endif; ?>

</div>

<div class="menu">

<!-- ================= ADMIN ================= -->

<?php if(($u['role'] ?? '') == 'admin'): ?>

<a href="?action=dashboard">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>

<a href="?action=orders">
<i class="bi bi-box-seam"></i>
Quản lý đơn hàng
</a>

<a href="?action=customers">
<i class="bi bi-people"></i>
Quản lý khách hàng
</a>

<a href="?action=shippers">
<i class="bi bi-truck"></i>
Quản lý shipper
</a>

<a href="?action=users">
<i class="bi bi-person-gear"></i>
Quản lý nhân viên
</a>

<?php endif; ?>


<!-- ================= OPERATOR ================= -->

<?php if(($u['role'] ?? '') == 'operator'): ?>

<a href="?action=dashboard">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>

<a href="?action=orders">
<i class="bi bi-box-seam"></i>
Quản lý đơn hàng
</a>

<a href="?action=customers">
<i class="bi bi-people"></i>
Quản lý khách hàng
</a>

<?php endif; ?>


<!-- ================= SHIPPER ================= -->

<?php if(($u['role'] ?? '') == 'shipper'): ?>

<a href="?action=my_orders">
<i class="bi bi-box-seam"></i>
Đơn hàng của tôi
</a>

<a href="?action=shipper_history">
<i class="bi bi-clock-history"></i>
Lịch sử giao hàng
</a>

<?php endif; ?>


<!-- ================= LOGOUT ================= -->

<a href="?action=logout">
<i class="bi bi-box-arrow-right"></i>
Đăng xuất
</a>

</div>

</div>

<!-- ================= CONTENT ================= -->

<div class="content">

<div class="topbar">

<h3>
🚚 Hệ thống quản lý giao hàng
</h3>

</div>