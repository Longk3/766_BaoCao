<?php require "../app/views/layout/header.php"; ?>
<h2>Đơn của tôi</h2>
<?php foreach($orders as $o): ?>
<p>#<?= $o['order_id'] ?> - <?= $o['status_name'] ?></p>
<?php endforeach; ?>
<?php require "../app/views/layout/footer.php"; ?>