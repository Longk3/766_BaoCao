<?php require "../app/views/layout/header.php"; ?>

<h2>Orders</h2>

<table class="table">
<?php foreach($orders as $o): ?>
<tr>
<td><?= $o['order_id'] ?></td>
<td><?= $o['customer_name'] ?></td>
<td><?= $o['status_name'] ?></td>
<td>
<form method="POST" action="index.php?action=updateStatus">
<input type="hidden" name="id" value="<?= $o['order_id'] ?>">
<select name="status">
<?php foreach($statuses as $s): ?>
<option value="<?= $s['status_id'] ?>"><?= $s['status_name'] ?></option>
<?php endforeach; ?>
</select>
<button>OK</button>
</form>
</td>
</tr>
<?php endforeach; ?>
</table>

<?php require "../app/views/layout/footer.php"; ?>