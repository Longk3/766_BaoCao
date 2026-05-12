<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>➕ Thêm shipper</h2>

<form method="POST"
action="?action=storeShipper">

<div class="mb-3">

<label>Họ tên</label>

<input type="text"
name="full_name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>SĐT</label>

<input type="text"
name="phone"
class="form-control">

</div>

<div class="mb-3">

<label>Phương tiện</label>

<input type="text"
name="vehicle_type"
class="form-control">

</div>

<div class="mb-3">

<label>Khu vực</label>

<input type="text"
name="area"
class="form-control">

</div>

<button class="btn btn-danger">
Lưu
</button>

<a href="?action=shippers"
class="btn btn-secondary">

Quay lại

</a>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>