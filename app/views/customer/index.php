<?php require "../app/views/layout/header.php"; ?>

<h2>Khách hàng</h2>

<table class="table">
<tr><th>ID</th><th>Tên</th><th>SĐT</th><th>Email</th><th>Địa chỉ</th></tr>

<?php foreach($data as $c): ?>
<tr>
<td><?= $c['customer_id'] ?></td>
<td><?= $c['full_name'] ?></td>
<td><?= $c['phone'] ?></td>
<td><?= $c['email'] ?></td>
<td><?= $c['address'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php require "../app/views/layout/footer.php"; ?>