<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>📜 Lịch sử giao hàng</h2>

<table class="table table-bordered">

<thead>
<tr>
<th>ID</th>
<th>Khách hàng</th>
<th>Địa chỉ</th>
<th>Tiền hàng</th>
<th>Trạng thái</th>
</tr>
</thead>

<tbody>

<?php foreach($orders as $o): ?>

<tr>

<td>#<?= $o['order_id'] ?></td>

<td><?= $o['customer_name'] ?></td>

<td><?= $o['delivery_address'] ?></td>

<td><?= number_format($o['total_amount']) ?> đ</td>

<td><?= $o['status_name'] ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php require "../app/views/layout/footer.php"; ?>