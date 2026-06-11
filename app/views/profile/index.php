<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>👤 Thông tin cá nhân</h2>

<table class="table">

<tr>
<th>Họ tên</th>
<td><?= $user['full_name'] ?></td>
</tr>

<tr>
<th>Username</th>
<td><?= $user['username'] ?></td>
</tr>

<tr>
<th>Vai trò</th>
<td><?= strtoupper($user['role']) ?></td>
</tr>

</table>

<a href="?action=editProfile"
class="btn btn-warning">
Sửa thông tin
</a>

<a href="?action=changePassword"
class="btn btn-danger">
Đổi mật khẩu
</a>

</div>

<?php require "../app/views/layout/footer.php"; ?>