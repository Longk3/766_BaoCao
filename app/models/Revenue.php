<?php

require_once "../app/config/database.php";

class Revenue
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->connect();
    }

    // Tổng doanh thu
    public function getTotalRevenue()
    {
        $sql = "
            SELECT SUM(total_amount)
            FROM orders
            WHERE status_id = 4
        ";

        return $this->conn->query($sql)->fetchColumn();
    }

    // Tổng số đơn giao thành công
    public function getTotalSuccessOrders()
    {
        $sql = "
            SELECT COUNT(*)
            FROM orders
            WHERE status_id = 4
        ";

        return $this->conn->query($sql)->fetchColumn();
    }

    // Doanh thu trung bình mỗi đơn
    public function getAverageRevenue()
    {
        $sql = "
            SELECT AVG(total_amount)
            FROM orders
            WHERE status_id = 4
        ";

        return $this->conn->query($sql)->fetchColumn();
    }

    // Doanh thu tháng hiện tại
    public function getCurrentMonthRevenue()
    {
        $sql = "
            SELECT SUM(total_amount)
            FROM orders
            WHERE status_id = 4
            AND MONTH(order_date)=MONTH(CURDATE())
            AND YEAR(order_date)=YEAR(CURDATE())
        ";

        return $this->conn->query($sql)->fetchColumn();
    }

    // Doanh thu theo ngày
    public function getRevenueByDay()
    {
        $sql = "
            SELECT
                DATE(order_date) AS day,
                SUM(total_amount) AS revenue
            FROM orders
            WHERE status_id = 4
            GROUP BY DATE(order_date)
            ORDER BY day
        ";

        return $this->conn
                    ->query($sql)
                    ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Doanh thu theo tháng
    public function getRevenueByMonth()
    {
        $sql = "
            SELECT
                MONTH(order_date) AS month,
                YEAR(order_date) AS year,
                SUM(total_amount) AS revenue
            FROM orders
            WHERE status_id = 4
            GROUP BY YEAR(order_date), MONTH(order_date)
            ORDER BY year, month
        ";

        return $this->conn
                    ->query($sql)
                    ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Doanh thu theo năm
    public function getRevenueByYear()
    {
        $sql = "
            SELECT
                YEAR(order_date) AS year,
                SUM(total_amount) AS revenue
            FROM orders
            WHERE status_id = 4
            GROUP BY YEAR(order_date)
            ORDER BY year
        ";

        return $this->conn
                    ->query($sql)
                    ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Top 5 khách hàng
    public function getTopCustomers()
    {
        $sql = "
            SELECT
                c.full_name,
                SUM(o.total_amount) AS total_money
            FROM orders o
            JOIN customer c
                ON o.customer_id = c.customer_id
            WHERE o.status_id = 4
            GROUP BY c.customer_id
            ORDER BY total_money DESC
            LIMIT 5
        ";

        return $this->conn
                    ->query($sql)
                    ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Top 5 shipper
    public function getTopShippers()
    {
        $sql = "
            SELECT
                s.full_name,
                COUNT(*) AS total_orders
            FROM assignment a
            JOIN shipper s
                ON a.shipper_id = s.shipper_id
            JOIN orders o
                ON a.order_id = o.order_id
            WHERE o.status_id = 4
            GROUP BY s.shipper_id
            ORDER BY total_orders DESC
            LIMIT 5
        ";

        return $this->conn
                    ->query($sql)
                    ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tỷ lệ giao thành công
    public function getSuccessRate()
    {
        $sql = "
            SELECT
                ROUND(
                    SUM(status_id = 4) * 100 / COUNT(*),
                    2
                ) AS success_rate
            FROM orders
        ";

        return $this->conn
                    ->query($sql)
                    ->fetchColumn();
    }

    // Lọc doanh thu theo khoảng thời gian
    public function getRevenueByDateRange($from, $to)
    {
        $sql = "
            SELECT SUM(total_amount) AS revenue
            FROM orders
            WHERE status_id = 4
            AND DATE(order_date)
            BETWEEN ? AND ?
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$from, $to]);

        return $stmt->fetchColumn();
    }
}