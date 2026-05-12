<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>🚚 Chi tiết shipper</h2>

<table class="table">

<tr>
<th>ID</th>
<td><?= $shipper['shipper_id'] ?></td>
</tr>

<tr>
<th>Họ tên</th>
<td><?= $shipper['full_name'] ?></td>
</tr>

<tr>
<th>SĐT</th>
<td><?= $shipper['phone'] ?></td>
</tr>

<tr>
<th>Phương tiện</th>
<td><?= $shipper['vehicle_type'] ?></td>
</tr>

<tr>
<th>Khu vực</th>
<td><?= $shipper['area'] ?></td>
</tr>

</table>

<a href="?action=shippers"
class="btn btn-secondary">

Quay lại

</a>

</div>

<?php require "../app/views/layout/footer.php"; ?>