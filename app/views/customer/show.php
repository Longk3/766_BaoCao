<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>👤 Chi tiết khách hàng</h2>

<table class="table">

<tr>
<th>ID</th>
<td><?= $customer['customer_id'] ?></td>
</tr>

<tr>
<th>Họ tên</th>
<td><?= $customer['full_name'] ?></td>
</tr>

<tr>
<th>SĐT</th>
<td><?= $customer['phone'] ?></td>
</tr>

<tr>
<th>Email</th>
<td><?= $customer['email'] ?></td>
</tr>

<tr>
<th>Địa chỉ</th>
<td><?= $customer['address'] ?></td>
</tr>

</table>

<a href="?action=customers"
class="btn btn-secondary">

Quay lại

</a>

</div>

<?php require "../app/views/layout/footer.php"; ?>