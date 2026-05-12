<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2>✏️ Sửa khách hàng</h2>

<form method="POST"
action="?action=updateCustomer">

<input type="hidden"
name="customer_id"
value="<?= $customer['customer_id'] ?>">

<div class="mb-3">
<label>Họ tên</label>
<input type="text"
name="full_name"
class="form-control"
value="<?= $customer['full_name'] ?>">
</div>

<div class="mb-3">
<label>SĐT</label>
<input type="text"
name="phone"
class="form-control"
value="<?= $customer['phone'] ?>">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control"
value="<?= $customer['email'] ?>">
</div>

<div class="mb-3">
<label>Địa chỉ</label>
<input type="text"
name="address"
class="form-control"
value="<?= $customer['address'] ?>">
</div>

<button class="btn btn-danger">
Cập nhật
</button>

<a href="?action=customers"
class="btn btn-secondary">

Quay lại

</a>

</form>

</div>

<?php require "../app/views/layout/footer.php"; ?>