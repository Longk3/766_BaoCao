<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>📦 Chi tiết đơn hàng</h2>

<table class="table">

<tr>
<th>Mã đơn</th>
<td><?= $order['order_id'] ?></td>
</tr>

<tr>
<th>Khách hàng</th>
<td><?= $order['customer_name'] ?></td>
</tr>

<tr>
<th>Địa chỉ giao</th>
<td><?= $order['delivery_address'] ?></td>
</tr>

<tr>
<th>Tổng tiền</th>
<td><?= number_format($order['total_amount']) ?> VNĐ</td>
</tr>

<tr>
<th>Trạng thái</th>
<td><?= $order['status_name'] ?></td>
</tr>

<tr>
<th>Shipper</th>
<td><?= $order['shipper_name'] ?></td>
</tr>

</table>

<a href="?action=orders"
class="btn btn-secondary">
Quay lại
</a>

</div>

<?php require "../app/views/layout/footer.php"; ?>