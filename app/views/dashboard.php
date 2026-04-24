<?php require "../app/views/layout/header.php"; ?>

<h2>Dashboard</h2>
<p>Tổng đơn hàng: <?= $total ?></p>

<canvas id="chart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const data = <?= json_encode($status) ?>;

new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: data.map(i => i.status_name),
        datasets: [{
            label: 'Số đơn',
            data: data.map(i => i.total)
        }]
    }
});
</script>

<?php require "../app/views/layout/footer.php"; ?>