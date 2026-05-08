<?php require "../app/views/layout/header.php"; ?>

<h2>Thêm nhân viên</h2>

<form method="POST">
<input name="username" class="form-control mb-2" placeholder="Username">

<input name="password" class="form-control mb-2" placeholder="Password">

<select name="role" class="form-control mb-2">
<option value="operator">Operator</option>
<option value="shipper">Shipper</option>
<option value="admin">Admin</option>
</select>

<button class="btn btn-success">Lưu</button>
</form>

<?= $error ?? '' ?>

<?php require "../app/views/layout/footer.php"; ?>