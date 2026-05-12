<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>✏️ Sửa đơn hàng</h2>

<form method="POST" action="?action=updateOrder">

<input type="hidden"
name="order_id"
value="<?= $order['order_id'] ?>">

<div class="mb-3">

<label>Khách hàng</label>

<select name="customer_id" class="form-select">

<?php foreach($customers as $c): ?>

<option value="<?= $c['customer_id'] ?>"
<?= $c['customer_id']==$order['customer_id']?'selected':'' ?>>

<?= $c['full_name'] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label>Địa chỉ giao</label>

<input type="text"
name="delivery_address"
class="form-control"
value="<?= $order['delivery_address'] ?>">

</div>

<div class="mb-3">

<label>Tổng tiền</label>

<input type="number"
name="total_amount"
class="form-control"
value="<?= $order['total_amount'] ?>">

</div>

<div class="mb-3">

<label>Shipper</label>

<select name="shipper_id" class="form-select">

<?php foreach($shippers as $s): ?>

<option value="<?= $s['shipper_id'] ?>">

<?= $s['full_name'] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<button class="btn btn-danger">
Cập nhật
</button>

<a href="?action=orders"
class="btn btn-secondary">
Quay lại
</a>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>