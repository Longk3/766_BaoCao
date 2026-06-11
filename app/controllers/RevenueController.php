<?php

require_once "../app/models/Revenue.php";
require_once "../app/libs/AuthMiddleware.php";

class RevenueController
{
    public function index()
    {
        AuthMiddleware::role(['admin']);

        $model = new Revenue();

        // Tổng doanh thu
        $totalRevenue = $model->getTotalRevenue();

        // Tổng đơn hoàn thành
        $completedOrders = $model->getTotalSuccessOrders();

        // Doanh thu trung bình mỗi đơn
        $averageRevenue = $model->getAverageRevenue();

        // Doanh thu tháng hiện tại
        $currentMonthRevenue = $model->getCurrentMonthRevenue();

        // Doanh thu theo ngày
        $dailyRevenue = $model->getRevenueByDay();

        // Doanh thu theo tháng
        $monthlyRevenue = $model->getRevenueByMonth();

        // Doanh thu theo năm
        $yearlyRevenue = $model->getRevenueByYear();

        // Top khách hàng
        $topCustomers = $model->getTopCustomers();

        // Top shipper
        $topShippers = $model->getTopShippers();

        // Tỷ lệ giao thành công
        $successRate = $model->getSuccessRate();

        // Doanh thu theo khoảng thời gian
        $revenueRange = null;

        if (
            isset($_GET['from_date']) &&
            isset($_GET['to_date']) &&
            !empty($_GET['from_date']) &&
            !empty($_GET['to_date'])
        ) {

            $revenueRange = $model->getRevenueByDateRange(
                $_GET['from_date'],
                $_GET['to_date']
            );
        }

        require "../app/views/revenue/index.php";
    }
}