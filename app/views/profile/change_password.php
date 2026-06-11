<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>🔑 Đổi mật khẩu</h2>

<form method="POST"
action="?action=updatePassword">

<div class="mb-3">

<label>Mật khẩu cũ</label>

<input
type="password"
name="old_password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Mật khẩu mới</label>

<input
type="password"
name="new_password"
class="form-control"
required>

</div>

<button class="btn btn-danger">
Đổi mật khẩu
</button>

<button type="button"
        class="btn btn-secondary"
        onclick="history.back()">
    Quay lại
</button>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>