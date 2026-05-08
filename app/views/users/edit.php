<?php require "../app/views/layout/header.php"; ?>

<h2>Sửa nhân viên</h2>

<form method="POST">
<input name="username" value="<?= $user['username'] ?>" class="form-control mb-2">

<select name="role" class="form-control mb-2">
<option value="operator" <?= $user['role']=='operator'?'selected':'' ?>>Operator</option>
<option value="shipper" <?= $user['role']=='shipper'?'selected':'' ?>>Shipper</option>
<option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
</select>

<button class="btn btn-primary">Cập nhật</button>
</form>

<?php require "../app/views/layout/footer.php"; ?>