<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>➕ Thêm nhân viên</h2>

<a href="?action=users"
class="btn btn-secondary">

Quay lại

</a>

</div>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Họ tên
</label>

<input type="text"
name="full_name"
class="form-control"
placeholder="Nhập họ tên nhân viên"
required>

</div>

<div class="mb-3">

<label class="form-label">
Tên đăng nhập
</label>

<input type="text"
name="username"
class="form-control"
placeholder="Nhập username"
required>

</div>

<div class="mb-3">

<label class="form-label">
Mật khẩu
</label>

<input type="password"
name="password"
class="form-control"
placeholder="Nhập mật khẩu"
required>

</div>

<div class="mb-4">

<label class="form-label">
Phân quyền
</label>

<select name="role"
class="form-select">

<option value="operator">
Operator
</option>

<option value="shipper">
Shipper
</option>

<option value="admin">
Admin
</option>

</select>

</div>

<button class="btn btn-success">
💾 Lưu nhân viên
</button>

</form>

<?php if(isset($error)): ?>

<div class="alert alert-danger mt-3">

<?= $error ?>

</div>

<?php endif; ?>

</div>

<?php require "../app/views/layout/footer.php"; ?>