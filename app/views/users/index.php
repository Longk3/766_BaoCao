<?php require "../app/views/layout/header.php"; ?>

<h2>Quản lý nhân viên</h2>

<a href="?action=createUser" class="btn btn-primary mb-2">Thêm</a>

<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Username</th>
<th>Role</th>
<th>Action</th>
</tr>

<?php foreach($data as $u): ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= $u['username'] ?></td>
<td><?= $u['role'] ?></td>
<td>
<a href="?action=editUser&id=<?= $u['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
<a href="?action=deleteUser&id=<?= $u['id'] ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Xóa?')">Xóa</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<?php require "../app/views/layout/footer.php"; ?>