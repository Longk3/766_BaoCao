<?php require "../app/views/layout/header.php"; ?>

<h2>Tạo đơn</h2>

<form method="POST">
<select name="customer_id" class="form-control mb-2">
<?php foreach($customers as $c): ?>
<option value="<?= $c['customer_id'] ?>">
<?= $c['full_name'] ?>
</option>
<?php endforeach; ?>
</select>

<input name="address" class="form-control mb-2" placeholder="Địa chỉ">
<input name="amount" class="form-control mb-2" placeholder="Số tiền">

<button class="btn btn-success">Tạo</button>
</form>

<?php require "../app/views/layout/footer.php"; ?>