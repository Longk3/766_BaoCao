<?php require "../app/views/layout/header.php"; ?>

<h2>Đăng nhập</h2>

<form method="POST">
    <input class="form-control mb-2" name="username" placeholder="Username">
    <input class="form-control mb-2" type="password" name="password" placeholder="Password">
    <button class="btn btn-primary">Đăng nhập</button>
</form>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<?php require "../app/views/layout/footer.php"; ?>