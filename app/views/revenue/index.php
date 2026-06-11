<?php require "../app/views/layout/header.php"; ?>

<div class="card-box">

<h2 class="mb-4">
📈 Báo cáo doanh thu
</h2>

<div class="row g-4">

    <!-- Tổng doanh thu -->
    <div class="col-md-3">
        <div class="card bg-success text-white shadow">
            <div class="card-body">
                <h5>Tổng doanh thu</h5>
                <h3><?= number_format($totalRevenue) ?> VNĐ</h3>
            </div>
        </div>
    </div>

    <!-- Đơn hoàn thành -->
    <div class="col-md-3">
        <div class="card bg-primary text-white shadow">
            <div class="card-body">
                <h5>Đơn hoàn thành</h5>
                <h3><?= $completedOrders ?></h3>
            </div>
        </div>
    </div>

    <!-- Trung bình mỗi đơn -->
    <div class="col-md-3">
        <div class="card bg-warning text-white shadow">
            <div class="card-body">
                <h5>TB / đơn hàng</h5>
                <h3><?= number_format($averageRevenue) ?> VNĐ</h3>
            </div>
        </div>
    </div>

    <!-- Doanh thu tháng hiện tại -->
    <div class="col-md-3">
        <div class="card bg-danger text-white shadow">
            <div class="card-body">
                <h5>Doanh thu tháng này</h5>
                <h3><?= number_format($currentMonthRevenue) ?> VNĐ</h3>
            </div>
        </div>
    </div>

</div>


<!-- Biểu đồ doanh thu -->
<div class="card mt-4 shadow">

    <div class="card-body">

        <h4 class="mb-4">
            📊 Doanh thu theo tháng
        </h4>

        <canvas id="revenueChart"></canvas>

    </div>

</div>


<!-- Bảng doanh thu -->
<div class="card mt-4 shadow">

    <div class="card-body">

        <h4 class="mb-4">
            📋 Chi tiết doanh thu theo tháng
        </h4>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>Tháng</th>
                    <th>Doanh thu</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($monthlyRevenue as $r): ?>

                <tr>

                    <td>
                        Tháng <?= $r['month'] ?>
                    </td>

                    <td>
                        <?= number_format($r['revenue']) ?> VNĐ
                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('revenueChart'), {

    type: 'bar',

    data: {

        labels: [

            <?php
            foreach($monthlyRevenue as $r)
            {
                echo "'Tháng ".$r['month']."',";
            }
            ?>

        ],

        datasets: [{

            label: 'Doanh thu (VNĐ)',

            data: [

                <?php
                foreach($monthlyRevenue as $r)
                {
                    echo $r['revenue'].",";
                }
                ?>

            ],

            backgroundColor: '#198754',

            borderColor: '#146c43',

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                display: true
            }

        },

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

<?php require "../app/views/layout/footer.php"; ?>