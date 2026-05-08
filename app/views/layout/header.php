<?php
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
    $u = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<a href="?action=orders"><i class="bi bi-box"></i> Đơn hàng</a>
<style>
body{display:flex}
.sidebar{width:220px;background:#343a40;color:#fff;height:100vh;padding:10px}
.sidebar a{color:#fff;display:block;padding:8px}
.sidebar a:hover{background:#495057}
.content{flex:1;padding:20px}
</style>
</head>
<body>

<div class="sidebar">
<h4>🚚 System</h4>

<?php if($u): ?>
<p><?= $u['username'] ?> (<?= $u['role'] ?>)</p>

<a href="index.php?action=dashboard">Dashboard</a>

<?php if($u['role']!='shipper'): ?>
<a href="index.php?action=orders">Đơn</a>
<a href="index.php?action=customers">Khách</a>
<?php endif; ?>

<?php if($u['role']=='admin'): ?>
<a href="index.php?action=shippers">Shipper</a>
<?php endif; ?>

<?php if($u['role']=='shipper'): ?>
<a href="index.php?action=myOrders">Đơn của tôi</a>
<?php endif; ?>

<a href="index.php?action=logout">Logout</a>
<?php endif; ?>

</div>


<div class="content">