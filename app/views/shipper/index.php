<?php require "../app/views/layout/header.php"; ?>

<h2>Shipper</h2>

<table class="table">
<tr><th>ID</th><th>Tên</th><th>SĐT</th><th>Xe</th><th>Khu vực</th></tr>

<?php foreach($data as $s): ?>
<tr>
<td><?= $s['shipper_id'] ?></td>
<td><?= $s['full_name'] ?></td>
<td><?= $s['phone'] ?></td>
<td><?= $s['vehicle_type'] ?></td>
<td><?= $s['area'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php require "../app/views/layout/footer.php"; ?>