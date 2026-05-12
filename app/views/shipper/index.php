<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<div class="d-flex justify-content-between mb-4">

<h2>🚚 Quản lý Shipper</h2>

<a href="?action=createShipper"
class="btn btn-danger">

+ Thêm shipper

</a>

</div>

<table class="table table-hover">

<thead>

<tr>
<th>ID</th>
<th>Họ tên</th>
<th>SĐT</th>
<th>Phương tiện</th>
<th>Khu vực</th>
<th>Hành động</th>
</tr>

</thead>

<tbody>

<?php foreach($shippers as $s): ?>

<tr>

<td><?= $s['shipper_id'] ?></td>

<td><?= $s['full_name'] ?></td>

<td><?= $s['phone'] ?></td>

<td><?= $s['vehicle_type'] ?></td>

<td><?= $s['area'] ?></td>

<td>

<a href="?action=showShipper&id=<?= $s['shipper_id'] ?>"
class="btn btn-info btn-sm">

Chi tiết

</a>

<a href="?action=editShipper&id=<?= $s['shipper_id'] ?>"
class="btn btn-warning btn-sm">

Sửa

</a>

<a href="?action=deleteShipper&id=<?= $s['shipper_id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Xóa shipper?')">

Xóa

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php require "../app/views/layout/footer.php"; ?>