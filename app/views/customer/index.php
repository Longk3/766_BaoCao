<?php require "../app/views/layout/header.php"; ?>

<div class="d-flex justify-content-between mb-4">

<h2>👥 Khách hàng</h2>

<a href="?action=createCustomer"
class="btn btn-danger">

+ Thêm khách hàng

</a>

</div>

<table class="table">
<tr><th>ID</th><th>Tên</th><th>SĐT</th><th>Email</th><th>Địa chỉ</th><th>Hành động</th></tr>

<?php foreach($data as $c): ?>
<tr>
<td><?= $c['customer_id'] ?></td>
<td><?= $c['full_name'] ?></td>
<td><?= $c['phone'] ?></td>
<td><?= $c['email'] ?></td>
<td><?= $c['address'] ?></td>
<td>

<a href="?action=showCustomer&id=<?= $c['customer_id'] ?>"
class="btn btn-info btn-sm">

Chi tiết

</a>

<a href="?action=editCustomer&id=<?= $c['customer_id'] ?>"
class="btn btn-warning btn-sm">

Sửa

</a>

<a href="?action=deleteCustomer&id=<?= $c['customer_id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Xóa khách hàng?')">

Xóa

</a>

</td>
</tr>
<?php endforeach; ?>
</table>

<?php require "../app/views/layout/footer.php"; ?>