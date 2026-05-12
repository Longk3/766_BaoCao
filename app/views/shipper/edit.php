<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>✏️ Sửa shipper</h2>

<form method="POST"
action="?action=updateShipper">

<input type="hidden"
name="shipper_id"
value="<?= $shipper['shipper_id'] ?>">

<div class="mb-3">

<label>Họ tên</label>

<input type="text"
name="full_name"
class="form-control"
value="<?= $shipper['full_name'] ?>">

</div>

<div class="mb-3">

<label>SĐT</label>

<input type="text"
name="phone"
class="form-control"
value="<?= $shipper['phone'] ?>">

</div>

<div class="mb-3">

<label>Phương tiện</label>

<input type="text"
name="vehicle_type"
class="form-control"
value="<?= $shipper['vehicle_type'] ?>">

</div>

<div class="mb-3">

<label>Khu vực</label>

<input type="text"
name="area"
class="form-control"
value="<?= $shipper['area'] ?>">

</div>

<button class="btn btn-danger">
Cập nhật
</button>

<a href="?action=shippers"
class="btn btn-secondary">

Quay lại

</a>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>
