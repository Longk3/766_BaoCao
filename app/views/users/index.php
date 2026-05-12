<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Quản lý nhân viên</h2>

    <a href="index.php?action=user_create"
       class="btn btn-primary">
       + Thêm nhân viên
    </a>
</div>

<table class="table table-bordered table-hover bg-white">

<thead class="table-dark">

<tr>
    <th>STT</th>
    <th>Họ tên</th>
    <th>Username</th>
    <th>Role</th>
    <th>Hành động</th>
</tr>

</thead>

<tbody>

<?php $stt = 1; ?>

<?php foreach($users as $u): ?>

<tr>

<td><?= $stt++ ?></td>

<td><?= $u['full_name'] ?></td>

<td><?= $u['username'] ?></td>

<td><?= $u['role'] ?></td>

<td>

<a href="index.php?action=user_edit&id=<?= $u['id'] ?>"
class="btn btn-warning btn-sm">

Sửa

</a>

<a href="index.php?action=user_delete&id=<?= $u['id'] ?>"
class="btn btn-danger btn-sm">

Xóa

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</div>

<?php require "../app/views/layout/footer.php"; ?>