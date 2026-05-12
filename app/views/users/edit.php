<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>✏️ Sửa nhân viên</h2>

<form method="POST">

<div class="mb-3">

<label>Họ tên</label>

<input type="text"
name="full_name"
class="form-control"
value="<?= $user['full_name'] ?>">

</div>

<div class="mb-3">

<label>Username</label>

<input type="text"
name="username"
class="form-control"
value="<?= $user['username'] ?>">

</div>

<div class="mb-3">

<label>Role</label>

<select name="role"
class="form-select">

<option value="admin"
<?= $user['role']=='admin'?'selected':'' ?>>
Admin
</option>

<option value="operator"
<?= $user['role']=='operator'?'selected':'' ?>>
Operator
</option>

<option value="shipper"
<?= $user['role']=='shipper'?'selected':'' ?>>
Shipper
</option>

</select>

</div>

<button class="btn btn-warning">
Cập nhật
</button>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>