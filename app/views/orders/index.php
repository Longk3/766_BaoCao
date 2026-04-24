<?php require "../app/views/layout/header.php"; ?>

<h2>Đơn hàng</h2>
<a href="index.php?action=createOrder" class="btn btn-primary mb-2">Tạo đơn</a>

<table class="table table-bordered">
<tr>
<th>ID</th><th>Khách</th><th>Địa chỉ</th><th>Tiền</th><th>Shipper</th><th>Trạng thái</th><th>Action</th>
</tr>

<?php foreach($orders as $o): ?>
<tr>
<td><?= $o['order_id'] ?></td>
<td><?= $o['customer_name'] ?></td>
<td><?= $o['delivery_address'] ?></td>
<td><?= number_format($o['total_amount']) ?></td>
<td><?= $o['shipper_name'] ?? 'Chưa có' ?></td>
<td><?= $o['status_name'] ?></td>

<td>
<!-- update status -->
<form method="POST" action="index.php?action=updateStatus">
<input type="hidden" name="id" value="<?= $o['order_id'] ?>">
<select name="status">
<?php foreach($statuses as $s): ?>
<option value="<?= $s['status_id'] ?>"><?= $s['status_name'] ?></option>
<?php endforeach; ?>
</select>
<button class="btn btn-success btn-sm">OK</button>
</form>

<!-- assign -->
<form method="POST" action="index.php?action=assign">
<input type="hidden" name="order_id" value="<?= $o['order_id'] ?>">
<select name="shipper_id">
<?php foreach($shippers as $s): ?>
<option value="<?= $s['shipper_id'] ?>"><?= $s['full_name'] ?></option>
<?php endforeach; ?>
</select>
<button class="btn btn-warning btn-sm">Giao</button>
</form>

</td>
</tr>
<?php endforeach; ?>
</table>

<?php require "../app/views/layout/footer.php"; ?>