<?php require "../app/views/layout/header.php"; ?>

<div class="container-fluid">

<h2 class="mb-4 fw-bold">
📊 Dashboard Thống Kê
</h2>

<div class="row g-4">

    <!-- Tổng đơn -->
    <div class="col-md-3">
        <div class="card shadow border-0 bg-primary text-white">
            <div class="card-body">
                <h5>Tổng đơn hàng</h5>
                <h2><?= $totalOrders ?></h2>
            </div>
        </div>
    </div>

    <!-- Chờ xác nhận -->
    <div class="col-md-3">
        <div class="card shadow border-0 bg-secondary text-white">
            <div class="card-body">
                <h5>Chờ xác nhận</h5>
                <h2><?= $pending ?></h2>
            </div>
        </div>
    </div>

    <!-- Đã xác nhận -->
    <div class="col-md-3">
        <div class="card shadow border-0 bg-info text-white">
            <div class="card-body">
                <h5>Đã xác nhận</h5>
                <h2><?= $confirmed ?></h2>
            </div>
        </div>
    </div>

    <!-- Đang giao -->
    <div class="col-md-3">
        <div class="card shadow border-0 bg-warning text-white">
            <div class="card-body">
                <h5>Đang giao</h5>
                <h2><?= $shipping ?></h2>
            </div>
        </div>
    </div>

    <!-- Hoàn thành -->
    <div class="col-md-3">
        <div class="card shadow border-0 bg-success text-white">
            <div class="card-body">
                <h5>Hoàn thành</h5>
                <h2><?= $success ?></h2>
            </div>
        </div>
    </div>

    <!-- Giao thất bại -->
    <div class="col-md-3">
        <div class="card shadow border-0 bg-danger text-white">
            <div class="card-body">
                <h5>Giao thất bại</h5>
                <h2><?= $failed ?></h2>
            </div>
        </div>
    </div>

    <!-- Đã hủy -->
    <div class="col-md-3">
        <div class="card shadow border-0 bg-dark text-white">
            <div class="card-body">
                <h5>Đã hủy</h5>
                <h2><?= $cancelled ?></h2>
            </div>
        </div>
    </div>

</div>

<!-- ROW 2 -->
<div class="row g-4 mt-3">

    <!-- User -->
    <div class="col-md-6">

        <div class="card shadow border-0 h-100">

            <div class="card-body">

                <h4 class="mb-4">
                    👥 Thống kê người dùng
                </h4>

                <p>
                    <strong>Khách hàng:</strong>
                    <?= $totalCustomers ?>
                </p>

                <p>
                    <strong>Shipper:</strong>
                    <?= $totalShippers ?>
                </p>

            </div>

        </div>

    </div>

    <!-- Chart -->
    <div class="col-md-6">

        <div class="card shadow border-0">

            <div class="card-body">

                <h4 class="mb-4">
                    📦 Trạng thái đơn hàng
                </h4>

                <canvas id="orderChart"></canvas>

            </div>

        </div>

    </div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('orderChart');

new Chart(ctx, {

    type: 'doughnut',

    data: {

        labels: [
            'Chờ xác nhận',
            'Đã xác nhận',
            'Đang giao',
            'Hoàn thành',
            'Thất bại',
            'Đã hủy'
        ],

        datasets: [{

            data: [
                <?= $pending ?>,
                <?= $confirmed ?>,
                <?= $shipping ?>,
                <?= $success ?>,
                <?= $failed ?>,
                <?= $cancelled ?>
            ],

            backgroundColor: [
                '#ffc107',
                '#0dcaf0',
                '#fd7e14',
                '#198754',
                '#dc3545',
                '#6c757d'
            ]

        }]
    }

});

</script>

<?php require "../app/views/layout/footer.php"; ?>