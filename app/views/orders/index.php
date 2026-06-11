<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>📦 Quản lý đơn hàng</h2>

<form method="GET" class="row mb-3">

    <input type="hidden"
           name="action"
           value="orders">

    <div class="col-md-4">

        <input
            type="text"
            name="keyword"
            class="form-control"
            placeholder="Nhập mã đơn, khách hàng hoặc địa chỉ"
            value="<?= $_GET['keyword'] ?? '' ?>">

    </div>

    <div class="col-md-3">

        <select
            name="status"
            class="form-select">

            <option value="">
                Tất cả trạng thái
            </option>

            <?php foreach($statuses as $s): ?>

                <option
                    value="<?= $s['status_id'] ?>"

                    <?= (($_GET['status'] ?? '') == $s['status_id']) ? 'selected' : '' ?>

                >

                    <?= $s['status_name'] ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="col-md-3">

        <button class="btn btn-primary">

            🔍 Tìm kiếm

        </button>

        <a href="?action=orders"
           class="btn btn-secondary">

            Làm mới

        </a>

    </div>

</form>

<a href="?action=createOrder" class="btn btn-danger mb-3">
    + Tạo đơn hàng
</a>

<table class="table table-hover">

<thead>
<tr>
    <th>ID</th>
    <th>Khách hàng</th>
    <th>Trạng thái</th>
    <th>Cập nhật</th>
    <th>Hành động</th>
</tr>
</thead>

<tbody>

<?php foreach($orders as $o): ?>

<tr>

<td><?= $o['order_id'] ?></td>

<td><?= $o['customer_name'] ?></td>

<td>

<?php
$status = $o['status_name'];

if($status == 'Giao thành công'){
    echo "<span class='badge-status bg-success2'>$status</span>";
}
elseif($status == 'Đang giao'){
    echo "<span class='badge-status bg-warning2'>$status</span>";
}
else{
    echo "<span class='badge-status bg-danger2'>$status</span>";
}
?>

</td>

<td>

<form method="POST" action="index.php?action=update_order_status">

    <input type="hidden"
           name="order_id"
           value="<?= $o['order_id'] ?>">

    <select name="status_id" class="form-select">

        <?php foreach($statuses as $s): ?>

            <option value="<?= $s['status_id'] ?>"

                <?= ($o['status_id'] == $s['status_id']) ? 'selected' : '' ?>

            >

                <?= $s['status_name'] ?>

            </option>

        <?php endforeach; ?>

    </select>

    <button class="btn btn-primary btn-sm mt-2">
        Cập nhật
    </button>

</form>

</td>

<td>

<a href="?action=showOrder&id=<?= $o['order_id'] ?>"
class="btn btn-info btn-sm">
Chi tiết
</a>

<a href="?action=editOrder&id=<?= $o['order_id'] ?>"
class="btn btn-warning btn-sm">
Sửa
</a>

<a href="?action=deleteOrder&id=<?= $o['order_id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Xóa đơn hàng?')">
Xóa
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

<?php require "../app/views/layout/footer.php"; ?>