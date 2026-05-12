<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>➕ Thêm khách hàng</h2>

<form method="POST"
action="?action=storeCustomer">

<div class="mb-3">
<label>Họ tên</label>
<input type="text"
name="full_name"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Số điện thoại</label>
<input type="text"
name="phone"
class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control">
</div>

<div class="mb-3">
<label>Địa chỉ</label>
<input type="text"
name="address"
class="form-control">
</div>

<button class="btn btn-danger">
Lưu
</button>

<a href="?action=customers"
class="btn btn-secondary">

Quay lại

</a>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>