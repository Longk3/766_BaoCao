<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>✏️ Cập nhật thông tin</h2>

<form method="POST"
action="?action=updateProfile">

<div class="mb-3">

<label>Họ tên</label>

<input
type="text"
name="full_name"
class="form-control"
value="<?= $user['full_name'] ?>"
required>

</div>

<button class="btn btn-primary">
Lưu
</button>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>  