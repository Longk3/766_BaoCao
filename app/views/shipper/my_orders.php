<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>📦 Đơn hàng của tôi</h2>

<table class="table table-hover">

<thead>

<tr>
<th>ID</th>
<th>Khách hàng</th>
<th>Địa chỉ</th>
<th>Tổng tiền</th>
<th>Trạng thái</th>
<th>Cập nhật</th>
</tr>

</thead>

<tbody>

<?php foreach($orders as $o): ?>

<tr>

<td>#<?= $o['order_id'] ?></td>

<td><?= $o['customer_name'] ?></td>

<td><?= $o['delivery_address'] ?></td>

<td><?= number_format($o['total_amount']) ?> VNĐ</td>

<td>

<?php
$status = $o['status_name'];

if($status=='Đang giao'){
    echo "<span class='badge-status bg-warning2'>$status</span>";
}
elseif($status=='Đã xác nhận'){
    echo "<span class='badge-status bg-primary'>$status</span>";
}
else{
    echo "<span class='badge-status bg-danger2'>$status</span>";
}
?>

</td>

<td>

<form method="POST"
action="index.php?action=update_order_status">

<input type="hidden"
name="order_id"
value="<?= $o['order_id'] ?>">

<select name="status_id"
class="form-select">

<option value="3">
Đang giao
</option>

<option value="4">
Giao thành công
</option>

<option value="5">
Giao thất bại
</option>

<option value="6">
Đã hủy
</option>

</select>

<button class="btn btn-primary btn-sm mt-2">
Cập nhật
</button>

</form>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php require "../app/views/layout/footer.php"; ?>