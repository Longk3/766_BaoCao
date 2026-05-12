<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>📦 Quản lý đơn hàng</h2>

<a href="?action=createOrder" class="btn btn-danger">
+ Tạo đơn hàng
</a>

<table class="table table-hover">

<thead>
<tr>
<th>ID</th>
<th>Khách hàng</th>
<th>Trạng thái</th>
<th>Cập nhật</th>
<th>Hành động</th>
</tr>
</thead>

<tbody>

<?php foreach($orders as $o): ?>

<tr>

<td><?= $o['order_id'] ?></td>

<td><?= $o['customer_name'] ?></td>

<td>

<?php
$status = $o['status_name'];

if($status=='Giao thành công'){
    echo "<span class='badge-status bg-success2'>$status</span>";
}
elseif($status=='Đang giao'){
    echo "<span class='badge-status bg-warning2'>$status</span>";
}
else{
    echo "<span class='badge-status bg-danger2'>$status</span>";
}
?>

</td>

<td>

<form method="POST" action="?action=updateStatus">

<input type="hidden"
name="order_id"
value="<?= $o['order_id'] ?>">

<select name="status_id" class="form-select">

<option value="1">Chờ xác nhận</option>
<option value="2">Đã xác nhận</option>
<option value="3">Đang giao</option>
<option value="4">Giao thành công</option>
<option value="5">Giao thất bại</option>

</select>

<button class="btn btn-danger mt-2">
Cập nhật
</button>

</form>

</td>

<td>

<a href="?action=showOrder&id=<?= $o['order_id'] ?>"
class="btn btn-info btn-sm">
Chi tiết
</a>

<a href="?action=editOrder&id=<?= $o['order_id'] ?>"
class="btn btn-warning btn-sm">
Sửa
</a>

<a href="?action=deleteOrder&id=<?= $o['order_id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Xóa đơn hàng?')">
Xóa
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php require "../app/views/layout/footer.php"; ?>